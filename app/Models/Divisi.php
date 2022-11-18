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

    public function Pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
