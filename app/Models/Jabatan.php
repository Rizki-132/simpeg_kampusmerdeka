<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
     //mapping ke table
     protected $table = 'Jabatan';
     //mapping ke kolom fieldnya
 
     protected $fillable = ['nama'];
}
