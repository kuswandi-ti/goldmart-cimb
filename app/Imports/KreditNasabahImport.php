<?php

namespace App\Imports;

use App\Models\KreditNasabahTmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KreditNasabahImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new KreditNasabahTmp([
            'tgl_pencairan'     => right($row[1], 4) . "-" . mid($row[1], 3, 2) . "-" . left($row[1], 2),
            'nama_nasabah'      => $row[2],
            'no_loan'           => $row[3],
            'tlp_nasabah'       => $row[4],
            'alamat_nasabah'    => $row[5],
            'nilai_pencairan'   => $row[6],
            'gram_05'           => $row[7],
            'gram_1'            => $row[8],
            'gram_2'            => $row[9],
            'gram_3'            => $row[10],
            'gram_5'            => $row[11],
            'gram_10'           => $row[12],
            'gram_25'           => $row[13],
            'gram_50'           => $row[14],
            'gram_100'          => $row[15],
            'total_keping'      => $row[16],
            'total_gram'        => $row[17],
            'angsuran'          => $row[18],
            'tenor'             => $row[19],
            'tgl_lunas'         => right($row[20], 4) . "-" . mid($row[20], 3, 2) . "-" . left($row[20], 2),
        ]);
    }

    public function headingRow(): int
    {
        return 0;
    }
}
