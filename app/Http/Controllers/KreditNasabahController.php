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
            'status_lunas' => $request->status_pelunasan,
            'status_pengambilan_barang' => $request->status_pengambilan_barang,
            'tgl_pengambilan_barang' => $request->tgl_pengambilan_barang,
            'note_pengambilan_barang' => $request->note_pengambilan_barang,
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

    public function data(Request $request)
    {
        $query = KreditNasabah::orderBy('tgl_incoming', 'DESC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status_lunas', function ($query) {
                return '<h6><span class="badge bg-' . setStatusLunasBadge($query->status_lunas) . '">' . $query->status_lunas . '</span></h6>';
            })
            ->editColumn('status_pengambilan_barang', function ($query) {
                return '<h6><span class="badge bg-' . setStatusPengambilanBarangBadge($query->status_pengambilan_barang) . '">' . $query->status_pengambilan_barang . '</span></h6>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status_lunas == 'Belum Lunas' || $query->status_pengambilan_barang == 'Belum Diambil' || $query->status_pengambilan_barang == 'Pending') {
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
}
