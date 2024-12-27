<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditDetail extends Model
{
    use HasFactory;

    protected $table = 'kredit_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status_lunas',
        'tgl_lunas',
        'status_kirim_barang',
        'tgl_kirim_barang',
        'note_kirim_barang',
        'image',
        'updated_at',
        'updated_by',
    ];
}
