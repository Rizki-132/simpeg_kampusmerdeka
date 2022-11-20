<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

     //tabel relasi merujuk atau merefer ke tabel master / tujuan
     public function pegawai()
     {
         return $this->belongsTo(Pegawai::class);
     }
}
