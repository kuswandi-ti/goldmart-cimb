<?php

namespace App\Models;

use App\Models\KreditNasabah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'nama',
        'email',
        'no_tlp',
        'alamat',
        'created_by',
        'updated_by',
        'deleted_by',
        'restored_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'restored_at',
    ];

    public function kredit_nasabahs()
    {
        return $this->hasMany(KreditNasabah::class, 'id_nasabah', 'id');
    }
}
