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
 
     protected $fillable = ['nip','nama','jabatan_id','divisi_id','gender'];
}
