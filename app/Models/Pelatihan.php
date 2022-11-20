<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihan';

     //tabel relasi merujuk atau merefer ke tabel master / tujuan
     public function pegawai()
     {
         return $this->belongsTo(Pegawai::class);
     }


      //tabel relasi merujuk atau merefer ke tabel master / tujuan
      public function materi()
      {
          return $this->belongsTo(Materi::class);
      }
}
