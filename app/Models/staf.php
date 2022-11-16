<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staf extends Model
{
    use HasFactory;
    //mapping ke table
    protected $table = 'staf';
    //mapping ke kolom fieldnya

    protected $fillable = ['nip', 'nama','gender','alamat','email','foto'];
}
