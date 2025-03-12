<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditNasabahTmp extends Model
{
    use HasFactory;

    protected $table = 'kredit_nasabah_tmp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tgl_pencairan',
        'nama_nasabah',
        'no_loan',
        'tlp_nasabah',
        'alamat_nasabah',
        'nilai_pencairan',
        'gram_05',
        'gram_1',
        'gram_2',
        'gram_3',
        'gram_5',
        'gram_10',
        'gram_25',
        'gram_50',
        'gram_100',
        'total_keping',
        'total_gram',
        'angsuran',
        'tenor',
        'tgl_lunas',
        'created_by',
        'updated_by',
        'deleted_by',
        'restored_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'restored_at',
    ];
}
