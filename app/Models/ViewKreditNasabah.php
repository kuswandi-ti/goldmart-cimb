<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewKreditNasabah extends Model
{
    use HasFactory;

    protected $table = 'view_kredit_nasabah';

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
