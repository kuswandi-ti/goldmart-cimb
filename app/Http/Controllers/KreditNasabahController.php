<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditNasabah;

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
                                <a class="dropdown-item border-bottom" href="' . route('user.edit', $query) . '">
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
                        (!empty($update) ? $update : '') .'
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
