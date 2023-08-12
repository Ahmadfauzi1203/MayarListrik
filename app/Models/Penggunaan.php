<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = 'penggunaan';
    protected $primaryKey = 'id_penggunaan';
    public $timestamps = false;
    protected $fillable = [
        'id_penggunaan',
        'id_pelanggan',
        'bulan',
        'tahun',
        'meter_awal',
        'meter_akhir',
        'petugas',
    ];

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, "id_penggunaan");
    }
    public function tagihans()
    {
        return $this->belongsTo(Tagihan::class, "id_penggunaan");
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function pelanggans()
    {
        return $this->hasMany(Penggunaan::class, "id_pelanggan");
    }
}
