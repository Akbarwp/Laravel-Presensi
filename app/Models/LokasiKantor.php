<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiKantor extends Model
{
    use HasFactory;

    protected $table = "lokasi_kantor";

    protected $fillable = [
        'kota',
        'alamat',
        'latitude',
        'longitude',
        'radius',
        'is_used',
    ];
}
