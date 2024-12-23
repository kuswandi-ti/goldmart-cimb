<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_nasabah = DB::table('kredit_nasabah')
                        ->select(DB::raw('COUNT(DISTINCT kode_nasabah) as total_nasabah'))
                        ->first();
        $total_nilai_kredit = DB::table('kredit_nasabah')
                            ->select(DB::raw('SUM(total_nilai_kredit) AS total_nilai_kredit'))
                            ->first();
        $total_margin_keuntungan = DB::table('kredit_nasabah')
                                ->select(DB::raw('SUM(margin_keuntungan) AS total_margin_keuntungan'))
                                ->first();
        $total_sudah_lunas = DB::table('kredit_nasabah')
                        ->select(DB::raw('SUM(total_nilai_kredit) AS total_pelunasan'))
                        ->where('status_lunas', '=', 'Sudah Lunas')
                        ->first();
        $total_belum_lunas = DB::table('kredit_nasabah')
                            ->select(DB::raw('SUM(total_nilai_kredit) AS total_belum_lunas'))
                            ->where('status_lunas', '=', 'Belum Lunas')
                            ->first();

        return view('dashboard.index', compact('total_nasabah', 'total_nilai_kredit', 'total_margin_keuntungan', 'total_sudah_lunas', 'total_belum_lunas'));
    }
}
