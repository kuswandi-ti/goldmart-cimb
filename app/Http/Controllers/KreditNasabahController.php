<?php

namespace App\Http\Controllers;

use DB;
use App\Models\KreditDetail;
use Illuminate\Http\Request;
use App\Models\KreditNasabah;
use App\Traits\FileUploadTrait;
use App\Models\ViewKreditNasabah;
use App\Imports\KreditNasabahImport;
use App\Models\KreditNasabahTmp;
use App\Models\Nasabah;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class KreditNasabahController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware('permission:kredit nasabah index', ['only' => ['index', 'show', 'data', 'dataLunas', 'showDetail', 'detailData']]);
        $this->middleware('permission:kredit nasabah update', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kredit_nasabah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kredit_nasabah = KreditNasabah::findOrFail($id);
        $kredit_detail = KreditDetail::where('id_kredit_nasabah', $id)->get();

        return view('kredit_nasabah.show', compact('kredit_nasabah', 'kredit_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kredit_nasabah = KreditNasabah::findOrFail($id);
        $kredit_detail = KreditDetail::where('id_kredit_nasabah', $id)->get();

        // return response()->json($kredit_nasabah);
        return view('kredit_nasabah.edit', compact('kredit_nasabah', 'kredit_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $id = $request->id;
        $imagePath = $this->handleImageUpload($request, 'image_barang', $request->old_image_barang, 'barang');

        $id_detail = $request->id_detail;
        $no_seri = $request->no_seri;
        $gramasi = $request->gramasi;

        $kredit_nasabah = KreditNasabah::findOrFail($id);
        $update = $kredit_nasabah->update([
            'status_kredit' => $request->status_kredit,
            'tgl_lunas' => $request->tgl_lunas,
            'status_kirim_barang' => $request->status_kirim_barang,
            'tgl_kirim_barang' => $request->tgl_kirim_barang,
            'note_kirim_barang' => $request->note_kirim_barang,
            'image' => !empty($imagePath) ? $imagePath : $request->old_image_barang,
            'updated_at' => saveDateTimeNow(),
            'updated_by' => auth()->user()->name,
        ]);

        // if (count($no_seri) > 0) {
        //     for ($i = 0; $i < count($no_seri); $i++) {
        //         if ($no_seri[$i] !== '' || !empty($no_seri[$i]) || $no_seri[$i] !== null) {
        //             $cek = KreditDetail::where('no_seri', '=', $no_seri[$i])->first();
        //             if ($cek) {
        //                 return redirect()->back()->withInput()->withErrors('Data No. [' . $cek->no_seri . '] sudah pernah dipakai');
        //             }
        //         }
        //     }
        // }

        if (count($no_seri) > 0) {
            for ($i = 0; $i < count($no_seri); $i++) {
                $update = KreditDetail::where('id', '=', $id_detail[$i])
                    ->update([
                        'no_seri' => ($no_seri[$i] == '' || empty($no_seri[$i]) || $no_seri[$i] == null) ? '' : $no_seri[$i],
                        'updated_at' => saveDateTimeNow(),
                        'updated_by' => auth()->user()->name,
                    ]);
            }
        }

        if ($update) {
            return redirect()->route('outstandingdanjaminan.index')->with('success', __('Data berhasil diperbarui'));
        } else {
            return redirect()->route('outstandingdanjaminan.index')->with('error', __('Data gagal diperbarui'));
        }
    }

    public function detail($filter)
    {
        $text = "";

        switch ($filter) {
            case 'nasabah':
                $text = "Total Nasabah";
                break;
            case 'kredit':
                $text = "Total Nilai Kredit";
                break;
            case 'keuntungan':
                $text = "Total Keuntungan";
                break;
            case 'sudah-lunas':
                $text = "Total Pelunasan";
                break;
            case 'belum-lunas':
                $text = "Belum Pelunasan";
                break;
            default:
                $text = "All";
        }

        return view('kredit_nasabah.detail', compact('text', 'filter'));
    }

    public function data(Request $request)
    {
        // $query = ViewKreditNasabah::periodeaktif()->belumlunas();

        $query = ViewKreditNasabah::belumlunas();
        // $query = KreditNasabah::belumlunas();

        // $query = KreditNasabah::select('kredit_nasabah.id AS id, kredit_nasabah.status_kredit AS status_kredit', 'kredit_nasabah.status_kirim_barang AS status_kirim_barang',
        //         'nasabah.nama AS nama_nasabah', 'nasabah.alamat AS alamat_nasabah', 'nasabah.no_tlp AS no_tlp',
        //         'kredit_nasabah.rekening_pencairan AS rekening_pencairan', 'kredit_nasabah.nama_barang AS nama_barang', 'kredit_nasabah.total_keping AS total_keping',
        //         'kredit_nasabah.total_nilai_kredit AS total_nilai_kredit', 'kredit_nasabah.margin_keuntungan AS margin_keuntungan',
        //         'kredit_nasabah.angsuran AS angsuran', 'kredit_nasabah.tenor AS tenor', 'kredit_nasabah.tgl_pencairan AS tgl_pencairan',
        //         'kredit_nasabah.tgl_lunas AS tgl_lunas', 'kredit_nasabah.tgl_kirim_barang AS tgl_kirim_barang')
        //     ->leftJoin('nasabah', 'kredit_nasabah.id_nasabah', '=', 'nasabah.id')
        //     ->where('kredit_nasabah.status_kredit', 'Berjalan');

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                if (canAccess(['kredit nasabah update'])) {
                    $update = '
                            <li>
                                <a class="edit dropdown-item border-bottom" href="' . route('outstandingdanjaminan.edit', $query) . '" data-toggle="tooltip" data-id="' . $query->id . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                }
                $view = '
                            <li>
                                <a class="edit dropdown-item border-bottom" href="' . route('outstandingdanjaminan.show', $query) . '" data-toggle="tooltip" data-id="' . $query->id . '">
                                    <i class="bx bx-show fs-20"></i> ' . __("Lihat") . '
                                </a>
                            </li>
                        ';
                if (canAccess(['kredit nasabah update'])) {
                    return '<div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog fs-16"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">' .
                        (!empty($update) ? $update : '') .
                        (!empty($view) ? $view : '') . '
                                </ul>
                            </div>';
                } else {
                    return '<div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog fs-16"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">' .
                        (!empty($view) ? $view : '') . '
                                </ul>
                            </div>';
                }
            })
            ->editColumn('status_kredit', function ($query) {
                return '<h6><span class="badge bg-' . setStatusKreditBadge($query->status_kredit) . '">' . $query->status_kredit . '</span></h6>';
            })
            ->editColumn('status_kirim_barang', function ($query) {
                return '<h6><span class="badge bg-' . setStatusKirimBarangBadge($query->status_kirim_barang) . '">' . $query->status_kirim_barang . '</span></h6>';
            })
            ->editColumn('total_keping', function ($query) {
                return '<a href="javascript:void(0)" id="id_kredit_nasabah" data-toggle="tooltip" title="Detail" data-id="' . $query->id . '"><u>' . $query->total_keping . '</u></a>';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function dataLunas(Request $request)
    {
        // $query = ViewKreditNasabah::periodeaktif()->lunas();

        $query = ViewKreditNasabah::lunas();
        // $query = KreditNasabah::lunas();

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                if (canAccess(['kredit nasabah update'])) {
                    $update = '
                            <li>
                                <a class="edit dropdown-item border-bottom" href="' . route('outstandingdanjaminan.edit', $query) . '" data-toggle="tooltip" data-id="' . $query->id . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                }
                if (canAccess(['kredit nasabah update'])) {
                    return '<div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm btn-wave waves-effect waves-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog fs-16"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">' .
                        (!empty($update) ? $update : '') . '
                                </ul>
                            </div>';
                } else {
                    return '<span class="badge rounded-pill bg-outline-danger">' . __("Tidak ada akses") . '</span>';
                }
            })
            ->editColumn('status_kredit', function ($query) {
                return '<h6><span class="badge bg-' . setStatusKreditBadge($query->status_kredit) . '">' . $query->status_kredit . '</span></h6>';
            })
            ->editColumn('status_kirim_barang', function ($query) {
                return '<h6><span class="badge bg-' . setStatusKirimBarangBadge($query->status_kirim_barang) . '">' . $query->status_kirim_barang . '</span></h6>';
            })
            ->editColumn('total_keping', function ($query) {
                return '<a href="javascript:void(0)" id="id_kredit_nasabah" data-toggle="tooltip" title="Detail" data-id="' . $query->id . '"><u>' . $query->total_keping . '</u></a>';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function showDetail(string $id)
    {
        $kredit_detail = DB::table('kredit_detail')
            ->where('id_kredit_nasabah', $id)
            ->orderBy('id', 'ASC')
            ->get();

        $nasabah = DB::table('nasabah')
            ->select(DB::raw('id, kode, nama'))
            ->where('id', $id)
            ->first();

        return response()->json(['kredit_detail' => $kredit_detail, 'nasabah' => $nasabah]);
    }

    public function detailData($filter)
    {
        // switch ($filter) {
        //     case 'nasabah':
        //         $query = ViewKreditNasabah::periodeaktif()->orderBy('tgl_incoming', 'DESC');
        //         break;
        //     case 'kredit':
        //         $query = ViewKreditNasabah::periodeaktif()->orderBy('tgl_incoming', 'DESC');
        //         break;
        //     case 'keuntungan':
        //         $query = ViewKreditNasabah::periodeaktif()->orderBy('tgl_incoming', 'DESC');
        //         break;
        //     case 'sudah-lunas':
        //         $query = ViewKreditNasabah::periodeaktif()->lunas()->orderBy('tgl_incoming', 'DESC');
        //         break;
        //     case 'belum-lunas':
        //         $query = ViewKreditNasabah::periodeaktif()->belumlunas()->orderBy('tgl_incoming', 'DESC');
        //         break;
        //     default:
        //         $query = "";
        // }

        switch ($filter) {
            case 'nasabah':
                $query = ViewKreditNasabah::where('id IS NOT NULL');
                break;
            case 'kredit':
                $query = ViewKreditNasabah::where('id IS NOT NULL');
                break;
            case 'keuntungan':
                $query = ViewKreditNasabah::where('id IS NOT NULL');
                break;
            case 'sudah-lunas':
                $query = ViewKreditNasabah::lunas()->where('id IS NOT NULL');
                break;
            case 'belum-lunas':
                $query = ViewKreditNasabah::belumlunas()->where('id IS NOT NULL');
                break;
            default:
                $query = "";
        }

        return datatables($query)
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function importData()
    {
        return view('import_data.index');
    }

    public function postImportData(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        // temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $arr_import = Excel::toArray(new KreditNasabahImport, storage_path('app/public/excel/' . $nama_file));

        // dd($arr_import);

        // remove from server
        Storage::delete($path);

        if (count($arr_import) > 0) {
            foreach ($arr_import as $key => $value) {
                foreach ($value as $row) {
                    // Insert ke tabel Nasabah
                    $nasabah = Nasabah::get();
                    $count_nasabah = $nasabah->count();
                    $bulan = right("00" . date('m'), 2);
                    $tahun = right(date('Y'), 2);
                    $kode_nasabah = "N" . "-" . $bulan . $tahun . "-" . right("000" . (int)$count_nasabah + 1, 5);
                    $insert_id_nasabah = Nasabah::insertGetId([
                        'kode'          => $kode_nasabah,
                        'nama'          => $row['nama_nasabah'],
                        'no_tlp'        => $row['telp_nasabah'],
                        'alamat'        => $row['alamat_nasabah'],
                        'created_at'    => saveDateTimeNow(),
                        'created_by'    => auth()->user()->name,
                    ]);

                    // Insert ke tabel Kredit Nasabah
                    $tgl_pencairan = right($row['tgl_pencairan'], 4) . "-" . mid($row['tgl_pencairan'], 3, 2) . "-" . left($row['tgl_pencairan'], 2);
                    $tgl_lunas = right($row['tgl_pelunasan'], 4) . "-" . mid($row['tgl_pelunasan'], 3, 2) . "-" . left($row['tgl_pelunasan'], 2);
                    $insert_id_header = KreditNasabah::insertGetId([
                        'tgl_pencairan'         => $tgl_pencairan,
                        'id_nasabah'            => $insert_id_nasabah,
                        'kode_nasabah'          => $kode_nasabah,
                        'nama_nasabah'          => $row['nama_nasabah'],
                        'no_loan'               => $row['no_loan'],
                        'tlp_nasabah'           => $row['telp_nasabah'],
                        'alamat_nasabah'        => $row['alamat_nasabah'],
                        'nilai_pencairan'       => $row['nilai_pencairan'],
                        'total_nilai_kredit'    => $row['nilai_pencairan'],
                        'total_keping'          => $row['total_keping'],
                        'total_gram'            => $row['total_gram'],
                        'angsuran'              => $row['angsuran'],
                        'tenor'                 => $row['jangka_waktu'],
                        'bulan'                 => date('m', strtotime($tgl_pencairan)),
                        'tahun'                 => date('Y', strtotime($tgl_pencairan)),
                        'tgl_lunas'             => $tgl_lunas,
                        'created_at'            => saveDateTimeNow(),
                        'created_by'            => auth()->user()->name,
                    ]);

                    $gram_05 = $row['05'];
                    $gram_1 = $row['1'];
                    $gram_2 = $row['2'];
                    $gram_3 = $row['3'];
                    $gram_5 = $row['5'];
                    $gram_10 = $row['10'];
                    $gram_25 = $row['25'];
                    $gram_50 = $row['50'];
                    $gram_100 = $row['100'];

                    if (!empty($gram_05)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 0.5,
                            'keping' => $gram_05,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_1)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 1,
                            'keping' => $gram_1,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_2)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 2,
                            'keping' => $gram_2,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_3)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 3,
                            'keping' => $gram_3,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_5)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 5,
                            'keping' => $gram_5,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_10)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 10,
                            'keping' => $gram_10,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_25)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 25,
                            'keping' => $gram_25,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_50)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 50,
                            'keping' => $gram_50,
                            'no_seri' => '',
                        ]);
                    }
                    if (!empty($gram_100)) {
                        KreditDetail::create([
                            'id_kredit_nasabah' => $insert_id_header,
                            'gramasi' => 100,
                            'keping' => $gram_100,
                            'no_seri' => '',
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with(['success' => 'Data Berhasil Diimport!']);
    }
}
