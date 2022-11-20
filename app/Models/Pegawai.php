<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
     //mapping ke table
     protected $table = 'pegawai';
     //mapping ke kolom fieldnya
 
     protected $fillable = ['nip','nama','jabatan_id','divisi_id','gender',
                            'tgl_lahir','tmp_lahir','alamat','foto'];

     //relasi one to many ke table pelatihan
     public function pelatihan()
     {
         return $this->hasMany(Pelatihan::class);
     }

     //relasi one to one ke table gajih

     public function gaji()
     {
         return $this->hasOne(Gaji::class);
     }


     //tabel relasi merujuk atau merefer ke tabel master / tujuan
     public function divisi()
     {
         return $this->belongsTo(Divisi::class);
     }

     public function jabatan()
     {
         return $this->belongsTo(Jabatan::class);
     }
}
