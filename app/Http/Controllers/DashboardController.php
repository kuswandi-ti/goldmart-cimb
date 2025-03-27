<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditNasabah;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /* Widget 1 - Start */
        // $total_nasabah = DB::table('kredit_nasabah')
        //     ->select(DB::raw('COUNT(DISTINCT id) as total_nasabah'))
        //     ->first();
        $total_nasabah = DB::table('nasabah')
            ->select(DB::raw('COUNT(DISTINCT id) as total_nasabah'))
            ->first();

        // $total_nasabah_belum_pelunasan = DB::table('nasabah')
        //     ->select(DB::raw('COUNT(nasabah.id) AS total_nasabah_belum_pelunasan'))
        //     ->where('kredit_nasabah.status_kredit', 'Berjalan')
        //     ->leftJoin('kredit_nasabah', 'nasabah.id', '=', 'kredit_nasabah.id_nasabah')
        //     ->first();
        $total_nasabah_belum_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('COUNT(id) AS total_nasabah_belum_pelunasan'))
            ->where('status_kredit', 'Berjalan')
            ->first();

        // $total_nasabah_sudah_pelunasan = DB::table('nasabah')
        //     ->select(DB::raw('COUNT(nasabah.id) AS total_nasabah_sudah_pelunasan'))
        //     ->where('kredit_nasabah.status_kredit', 'Lunas')
        //     ->leftJoin('kredit_nasabah', 'nasabah.id', '=', 'kredit_nasabah.id_nasabah')
        //     ->first();
        $total_nasabah_sudah_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('COUNT(id) AS total_nasabah_sudah_pelunasan'))
            ->where('status_kredit', 'Lunas')
            ->first();
        /* Widget 1 - End */

        // $total_nilai_kredit = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(total_nilai_kredit) AS total_nilai_kredit'))
        //     ->where('tahun', activePeriod())
        //     ->first();

        /* Widget 2 - Start */
        $total_nilai_kredit = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_nilai_kredit) AS total_nilai_kredit'))
            ->first();

        // $total_gramasi = DB::table('kredit_detail')
        //     ->select(DB::raw('SUM(gramasi) AS total_gramasi'))
        //     ->first();
        $total_gramasi = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_gram) AS total_gramasi'))
            ->first();

        // $total_kepingan = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(qty) AS total_kepingan'))
        //     ->first();
        $total_kepingan = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_keping) AS total_kepingan'))
            ->first();
        /* Widget 2 - End */

        /* Widget 3 - Start */
        $total_sudah_lunas = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_nilai_kredit) AS total_sudah_lunas'))
            ->where('status_kredit', '=', 'Lunas')
            ->first();

        // $total_gramasi_sudah_pelunasan = DB::table('kredit_detail')
        //     ->select(DB::raw('SUM(gramasi) AS total_gramasi_sudah_pelunasan'))
        //     ->leftJoin('kredit_nasabah', 'kredit_detail.id_kredit_nasabah', '=', 'kredit_nasabah.id')
        //     ->where('kredit_nasabah.status_kredit', 'Lunas')
        //     ->first();
        $total_gramasi_sudah_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_gram) AS total_gramasi_sudah_pelunasan'))
            ->where('status_kredit', 'Lunas')
            ->first();

        // $total_kepingan_sudah_pelunasan = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(qty) AS total_kepingan_sudah_pelunasan'))
        //     ->where('status_kredit', 'Lunas')
        //     ->first();
        $total_kepingan_sudah_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_keping) AS total_kepingan_sudah_pelunasan'))
            ->where('status_kredit', 'Lunas')
            ->first();
        /* Widget 3 - End */

        /* Widget 4 - Start */
        $total_belum_lunas = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_nilai_kredit) AS total_belum_lunas'))
            ->where('status_kredit', '=', 'Berjalan')
            ->first();

        // $total_gramasi_belum_pelunasan = DB::table('kredit_detail')
        //     ->select(DB::raw('SUM(gramasi) AS total_gramasi_belum_pelunasan'))
        //     ->leftJoin(
        //         'kredit_nasabah',
        //         'kredit_detail.id_kredit_nasabah',
        //         '=',
        //         'kredit_nasabah.id'
        //     )
        //     ->where('kredit_nasabah.status_kredit', 'Berjalan')
        //     ->first();
        $total_gramasi_belum_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_gram) AS total_gramasi_belum_pelunasan'))
            ->where('status_kredit', 'Berjalan')
            ->first();

        // $total_kepingan_belum_pelunasan = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(qty) AS total_kepingan_belum_pelunasan'))
        //     ->where('status_kredit', 'Berjalan')
        //     ->first();
        $total_kepingan_belum_pelunasan = DB::table('kredit_nasabah')
            ->select(DB::raw('SUM(total_keping) AS total_kepingan_belum_pelunasan'))
            ->where('status_kredit', 'Berjalan')
            ->first();
        /* Widget 4 - End */

        // $total_margin_keuntungan = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(margin_keuntungan) AS total_margin_keuntungan'))
        //     ->where('tahun', activePeriod())
        //     ->first();
        // $total_sudah_lunas = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(total_nilai_kredit) AS total_pelunasan'))
        //     ->where('status_kredit', '=', 'Lunas')
        //     ->where('tahun', activePeriod())
        //     ->first();
        // $total_belum_lunas = DB::table('kredit_nasabah')
        //     ->select(DB::raw('SUM(total_nilai_kredit) AS total_belum_lunas'))
        //     ->where('status_kredit', '=', 'Berjalan')
        //     ->where('tahun', activePeriod())
        //     ->first();

        $req1 = !empty($request->efy1) ? $request->efy1 : date('Y');
        $req2 = !empty($request->efy2) ? $request->efy2 : date('Y');
        // dd($req);
        // switch ($req) {
        //     case 'all':
        //         $where = 'customer_visit.tahun = ' . activePeriod();
        //         $type = 'ALL';
        //         $filter = 'Tahun ' . activePeriod();
        //         break;

        //     case 'daily':
        //         $where = 'customer_visit.tgl_visit = "' . searchDate($request->efd) . '"';
        //         $type = 'DAILY';
        //         $filter = 'Tanggal ' . $request->efd;
        //         break;

        //     case 'weekly':
        //         $where = 'customer_visit.week = ' . $request->efw .
        //             ' AND customer_visit.tahun = ' . activePeriod();
        //         $type = 'WEEKLY';
        //         $filter = 'Week ' . $request->efw . ', Tahun ' . activePeriod();
        //         break;

        //     case 'monthly':
        //         $where = 'customer_visit.bulan = ' . $request->efm .
        //             ' AND customer_visit.tahun = ' . activePeriod();
        //         $type = 'MONTHLY';
        //         $filter = 'BULAN ' . Str::upper(formatMonth($request->efm)) . ', Tahun ' . activePeriod();
        //         break;

        //     case 'quarterly':
        //         $where = 'customer_visit.quarter = ' . $request->efq .
        //             ' AND customer_visit.tahun = ' . activePeriod();
        //         $type = 'QUARTERLY';
        //         $filter = 'Quarter ' . $request->efq . ', Tahun ' . activePeriod();
        //         break;

        //     case 'yearly':
        //         $where = 'customer_visit.tahun = ' . $request->efy;
        //         $type = 'YEARLY';
        //         $filter = 'Tahun ' . $request->efy;
        //         break;

        //     default:
        //         $where = 'customer_visit.tahun = ' . activePeriod();
        //         $type = '';
        //         $filter = 'Tahun ' . activePeriod();
        //         break;
        // }

        $total_nilai_kredit_graph = array();
        for ($i = 0; $i < 12; $i++) {
            $total_nilai_kredit_graph[] = DB::table('kredit_nasabah')
                ->select(DB::raw('SUM(total_nilai_kredit) AS total_nilai_kredit'))
                ->whereYear('tgl_pencairan', $req1)
                ->whereMonth('tgl_pencairan', $i + 1)
                ->where('tahun', $req1)
                ->groupBy(DB::raw('MONTH(tgl_pencairan)'))
                ->orderBy(DB::raw('MONTH(tgl_pencairan)'))
                ->pluck('total_nilai_kredit')
                ->first();
        }
        $total_nilai_kredit_graph = array_map('intval', $total_nilai_kredit_graph);

        $total_nilai_pelunasan_graph = array();
        for ($i = 0; $i < 12; $i++) {
            $total_nilai_pelunasan_graph[] = DB::table('kredit_nasabah')
                ->select(DB::raw('SUM(total_nilai_kredit) AS total_nilai_kredit'))
                ->whereYear('tgl_lunas', $req1)
                ->where('status_kredit', 'Lunas')
                ->whereMonth('tgl_lunas', $i + 1)
                // ->where('tahun', $req)
                ->groupBy(DB::raw('MONTH(tgl_lunas)'))
                ->orderBy(DB::raw('MONTH(tgl_lunas)'))
                ->pluck('total_nilai_kredit')
                ->first();
        }
        $total_nilai_pelunasan_graph = array_map('intval', $total_nilai_pelunasan_graph);

        $total_emas_graph = array();
        $gramasis = DB::table('gramasi')
            ->orderBy('gramasi')
            ->get();
        foreach ($gramasis as $key) {
            $total_emas_graph[] = DB::table('kredit_detail')
                ->select(DB::raw('COUNT(kredit_detail.gramasi) AS count_gramasi'))
                ->join('kredit_nasabah', function ($join) {
                    $join->on('kredit_detail.id_kredit_nasabah', '=', 'kredit_nasabah.id');
                })
                ->where('kredit_detail.gramasi', $key->gramasi)
                ->where('kredit_nasabah.status_kredit', 'Berjalan')
                ->where('kredit_nasabah.tahun', $req2)
                ->groupBy(DB::raw('kredit_detail.gramasi'))
                ->pluck('count_gramasi')
                ->first();
        }
        $total_emas_graph = array_map('intval', $total_emas_graph);

        return view(
            'dashboard.index',
            compact(
                'total_nasabah',
                'total_nasabah_belum_pelunasan',
                'total_nasabah_sudah_pelunasan',
                'total_nilai_kredit',
                'total_gramasi',
                'total_kepingan',
                'total_sudah_lunas',
                'total_gramasi_sudah_pelunasan',
                'total_kepingan_sudah_pelunasan',
                'total_belum_lunas',
                'total_gramasi_belum_pelunasan',
                'total_kepingan_belum_pelunasan',
                // 'total_margin_keuntungan',
                // 'total_sudah_lunas',
                // 'total_belum_lunas',
                'total_nilai_kredit_graph',
                'total_nilai_pelunasan_graph',
                'total_emas_graph'
            )
        );
    }

    public function graph1(Request $request)
    {
        $req = $request->f1;
        $type = '';
        $filter = '';

        switch ($req) {
            case 'all1':
                $where = 'id IS NOT NULL';
                $type = 'ALL';
                $filter = 'Tahun ' . activePeriod();
                break;

            case 'yearly1':
                $where = 'tahun = ' . $request->efy1;
                $type = 'YEARLY';
                $filter = 'Tahun ' . $request->efy;
                break;

            default:
                $where = 'tahun = ' . date('Y');
                $type = '';
                $filter = 'Tahun ' . activePeriod();
                break;
        }



        $sql = "SELECT
                    sales_person.kode AS kode_sales_person,
                    sales_person.nama AS nama_sales_person,
                    sales_person.kode_store,
                    sales_person.nama_store,
                    sales_person.kota_store,
                    SUM(COALESCE(customer_visit.beli, 0)) AS total_beli,
                    SUM(COALESCE(customer_visit.qty, 0)) AS total_qty,
                    SUM(COALESCE(customer_visit.nominal, 0)) AS total_nominal
                FROM
                    sales_person
                    LEFT OUTER JOIN (
                        SELECT
                            CASE
                                WHEN customer_visit_detail.parameter_main = 'Beli' THEN COUNT(customer_visit.id)
                                ELSE 0
                            END AS beli,
                            customer_visit.id_sales_person,
                            SUM(customer_visit_detail.qty) AS qty,
                            SUM(customer_visit_detail.nominal) AS nominal
                        FROM
                            customer_visit
                            LEFT OUTER JOIN customer_visit_detail ON customer_visit.id = customer_visit_detail.id_visit
                        WHERE
                            customer_visit_detail.parameter_main = 'Beli'
                            AND " . $where . "
                        GROUP BY
                            customer_visit.id,
                            customer_visit.id_sales_person
                    ) customer_visit ON sales_person.id = customer_visit.id_sales_person
                WHERE
                    " . $where_store . "
                GROUP BY
                    sales_person.kode,
                    sales_person.nama,
                    sales_person.kode_store,
                    sales_person.nama_store,
                    sales_person.kota_store
                ORDER BY
                    sales_person.nama";

        // Untuk data yg tampil di tabel
        $data_table = DB::select($sql);

        // Untuk data di grafik
        $data_sales_graph = array();
        foreach ($data_table as $key) {
            $data_sales_graph[] = $key->nama_sales_person;
        }

        $data_qty_graph = array();
        foreach ($data_table as $key) {
            $data_qty_graph[] = $key->total_qty;
        }
        $data_qty_graph = array_map('intval', $data_qty_graph);

        $data_nominal_graph = array();
        foreach ($data_table as $key) {
            $data_nominal_graph[] = $key->total_nominal;
        }
        $data_nominal_graph = array_map('intval', $data_nominal_graph);

        $penjualan_hari_ini_per_person = DB::table('customer_visit')
            ->select(DB::raw('customer_visit.id_sales_person, customer_visit.kode_sales, customer_visit.nama_sales,
                    customer_visit.id_store, customer_visit.kode_store, customer_visit.nama_store, customer_visit.kota_store,
                    SUM(customer_visit_detail.qty) AS qty,
                    SUM(customer_visit_detail.nominal) AS nominal'))
            ->leftJoin('customer_visit_detail', 'customer_visit.id', '=', 'customer_visit_detail.id_visit')
            ->where('customer_visit.tgl_visit', saveDateNow())
            ->where('customer_visit_detail.parameter_main', 'Beli')
            ->groupBy([
                'customer_visit.id_sales_person',
                'customer_visit.kode_sales',
                'customer_visit.nama_sales',
                'customer_visit.id_store',
                'customer_visit.kode_store',
                'customer_visit.nama_store',
                'customer_visit.kota_store',
            ])
            ->get();

        $penjualan_bulan_ini_per_person = DB::table('customer_visit')
            ->select(DB::raw('customer_visit.id_sales_person, customer_visit.kode_sales, customer_visit.nama_sales,
                    customer_visit.id_store, customer_visit.kode_store, customer_visit.nama_store, customer_visit.kota_store,
                    SUM(customer_visit_detail.qty) AS qty,
                    SUM(customer_visit_detail.nominal) AS nominal'))
            ->leftJoin('customer_visit_detail', 'customer_visit.id', '=', 'customer_visit_detail.id_visit')
            ->whereYear('customer_visit.tgl_visit', activePeriod())
            ->whereMonth('customer_visit.tgl_visit', date('m'))
            ->where('customer_visit_detail.parameter_main', 'Beli')
            ->groupBy([
                'customer_visit.id_sales_person',
                'customer_visit.kode_sales',
                'customer_visit.nama_sales',
                'customer_visit.id_store',
                'customer_visit.kode_store',
                'customer_visit.nama_store',
                'customer_visit.kota_store',
            ])
            ->get();

        $penjualan_tahun_ini_per_person = DB::table('customer_visit')
            ->select(DB::raw('customer_visit.id_sales_person, customer_visit.kode_sales, customer_visit.nama_sales,
                    customer_visit.id_store, customer_visit.kode_store, customer_visit.nama_store, customer_visit.kota_store,
                    SUM(customer_visit_detail.qty) AS qty,
                    SUM(customer_visit_detail.nominal) AS nominal'))
            ->leftJoin('customer_visit_detail', 'customer_visit.id', '=', 'customer_visit_detail.id_visit')
            ->whereYear('customer_visit.tgl_visit', activePeriod())
            ->where('customer_visit_detail.parameter_main', 'Beli')
            ->groupBy([
                'customer_visit.id_sales_person',
                'customer_visit.kode_sales',
                'customer_visit.nama_sales',
                'customer_visit.id_store',
                'customer_visit.kode_store',
                'customer_visit.nama_store',
                'customer_visit.kota_store',
            ])
            ->get();

        $store = Store::orderBy('nama')->get();

        if (empty($request->submit) || $request->submit == 'search') {
            return view('laporan.penjualan_per_person', compact(
                'store',
                'nama_store',
                'data_table',
                'data_sales_graph',
                'data_qty_graph',
                'data_nominal_graph',
                'penjualan_hari_ini_per_person',
                'penjualan_bulan_ini_per_person',
                'penjualan_tahun_ini_per_person',
            ));
        } elseif ($request->submit == 'export') {
            return Excel::download(new LaporanPenjualanPerPersonExport($sql, $type, $filter, $nama_store), 'laporan_penjualan_per_person.xlsx');
        }
    }
}
