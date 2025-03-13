<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'id_nasabah',
        'kode_nasabah',
        'nama_nasabah',
        'tlp_nasabah',
        'alamat_nasabah',
        'no_loan',
        'tgl_pencairan',
        'tgl_incoming',
        'rekening_pencairan',
        'nama_barang',
        'image',
        'qty',
        'total_keping',
        'total_gram',
        'nilai_pencairan',
        'total_nilai_kredit',
        'margin_keuntungan',
        'angsuran',
        'tenor',
        'turun_plafon',
        'periode_bulan',
        'bulan',
        'tahun',
        'mitra',
        'status_kredit',
        'tgl_lunas',
        'status_kirim_barang',
        'tgl_kirim_barang',
        'note_kirim_barang',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
        'restored_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'restored_at',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah', 'id');
    }

    public function scopePeriodeAktif($query)
    {
        return $query->where('tahun', activePeriod());
    }

    public function scopeLunas($query)
    {
        return $query->where('status_kredit', 'Lunas');
    }

    public function scopeBelumLunas($query)
    {
        return $query->where('status_kredit', 'Berjalan');
    }
}
