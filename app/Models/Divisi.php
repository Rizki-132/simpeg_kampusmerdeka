<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    //mapping ke table
    protected $table = 'divisi';
    //mapping ke kolom fieldnya

    protected $fillable = ['nama'];
    //relasi one to many ke table pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
