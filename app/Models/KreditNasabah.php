<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditNasabah extends Model
{
    use HasFactory;

    protected $table = 'kredit_nasabah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_lunas',
        'status_pengambilan_barang',
        'tgl_pengambilan_barang',
        'note_pengambilan_barang',
        'updated_at',
        'updated_by',
    ];
}
