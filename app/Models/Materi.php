<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';


    //relasi one to many ke table pelatihan
    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class);
    }
}
