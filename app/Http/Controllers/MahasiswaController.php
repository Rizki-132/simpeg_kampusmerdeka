<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function dataMahasiswa(){
        $m1 = 'Budi Santoso' ; $am1 = 'Bandung';
        $m2 = 'Siti Suzanti' ; $am2 = 'Tanjung Enim';

        return view('daftar_Mahasiswa', 
        compact('m1','am1','m2','am2'));
    }

    public function nilaiMahasiswa(){

        $no = 1;
        $s1 = ['nama' => 'Sari', 'nilai'=>95];
        $s2 = ['nama' => 'Dendi', 'nilai'=>85];
        $s3 = ['nama' => 'Riza', 'nilai'=>80];
        $s4 = ['nama' => 'Suzi', 'nilai'=>80];
        $siswa = [$s1, $s2, $s3,$s4];
        $judul = ['no','nama','nilai','grade','predikat','keterangan'];

        return view('nilai', 
        compact('no','judul','siswa'));
    }   
}   

