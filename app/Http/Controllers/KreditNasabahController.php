<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditNasabah;
use Illuminate\Support\Facades\Validator;

class KreditNasabahController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kredit nasabah index', ['only' => ['index', 'show', 'data']]);
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
    public function show(KreditNasabah $kreditnasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kredit_nasabah = KreditNasabah::findOrFail($id);

        return response()->json($kredit_nasabah);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KreditNasabah $kreditnasabah)
    {
        $update = $kreditnasabah->update([
            'status_lunas' => $request->status_lunas,
            'tgl_lunas' => $request->tgl_lunas,
            'status_kirim_barang' => $request->status_kirim_barang,
            'tgl_kirim_barang' => $request->tgl_kirim_barang,
            'note_kirim_barang' => $request->note_kirim_barang,
            'updated_at' => saveDateTimeNow(),
            'updated_by' => auth()->user()->name,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diudapte!',
                'data'    => $kreditnasabah
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal diperbarui!'
            ]);
        }
    }

    public function detail($filter)
    {
        $text = "";

        switch ($filter) {
            case 'nasabah' :
                $text = "Total Nasabah";
                break;
            case 'kredit' :
                $text = "Total Nilai Kredit";
                break;
            case 'keuntungan' :
                $text = "Total Margin Keuntungan";
                break;
            case 'sudah-lunas' :
                $text = "Total Pelunasan";
                break;
            case 'belum-lunas' :
                $text = "Belum Pelunasan";
                break;
            default :
                $text = "All";
        }

        return view('kredit_nasabah.detail', compact('text', 'filter'));
    }

    public function data(Request $request)
    {
        $query = KreditNasabah::orderBy('tgl_incoming', 'DESC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status_lunas', function ($query) {
                return '<h6><span class="badge bg-' . setStatusLunasBadge($query->status_lunas) . '">' . $query->status_lunas . '</span></h6>';
            })
            ->editColumn('status_kirim_barang', function ($query) {
                return '<h6><span class="badge bg-' . setStatusKirimBarangBadge($query->status_kirim_barang) . '">' . $query->status_kirim_barang . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status_lunas == 'Belum Lunas' || $query->status_kirim_barang == 'Belum Dikirim') {
                    if (canAccess(['kredit nasabah update'])) {
                        $update = '
                            <li>
                                <a class="edit dropdown-item border-bottom" href="javascript:void(0);" data-toggle="tooltip" data-id="' . $query->id . '">
                                    <i class="bx bx-edit-alt fs-20"></i> ' . __("Perbarui") . '
                                </a>
                            </li>
                        ';
                    }
                } else {
                    $update = '
                            <li>
                                <a class="dropdown-item border-bottom">
                                    <i class="bx bx-minus-circle fs-20"></i> ' . __("Tidak Ada Aksi") . '
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
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function detail_data($filter)
    {
        switch ($filter) {
            case 'nasabah' :
                $query = KreditNasabah::orderBy('tgl_incoming', 'DESC');
                break;
            case 'kredit' :
                $query = KreditNasabah::orderBy('tgl_incoming', 'DESC');
                break;
            case 'keuntungan' :
                $query = KreditNasabah::orderBy('tgl_incoming', 'DESC');
                break;
            case 'sudah-lunas' :
                $query = KreditNasabah::where('status_lunas', '=', 'Sudah Lunas')->orderBy('tgl_incoming', 'DESC');
                break;
            case 'belum-lunas' :
                $query = KreditNasabah::where('status_lunas', '=', 'Belum Lunas')->orderBy('tgl_incoming', 'DESC');
                break;
            default :
                $query = "";
        }

        return datatables($query)
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }
}
