<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    public $timestamps = false;

    protected $fillable = [
        'id_tarif',
        'daya',
        'tarifperkwh',
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, "id_tarif");
    }
}
