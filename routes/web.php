<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\MahasiswaController;
use App\http\Controllers\StafController;
use App\http\Controllers\DivisiController;
use App\http\Controllers\JabatanController;
use App\http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/welcome', function () {
    return 'Semangat belajar';
});

Route::get('/salam', function () {
    return view('halaman_salam');
});

// Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
//     return '<ol>
//                 <li>nama : '.$nama.'</li>
//                 <li>Divisi : '.$divisi.'</li>
//             </ol>';
// });

Route::get('/mahasiswa', [MahasiswaController::class,'dataMahasiswa']);

Route::get('/nilai', [MahasiswaController::class,'nilaiMahasiswa']);

// ------------- routing landing page---------------
Route::get('/', function () {
    return view('landingpage.home');
});

Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/contact', function () {
    return view('landingpage.kontak');
});
// ------------- routing landing page---------------
Route::get('/administrator', function () {
    return view('admin.home');
});

// jika menggunakan php artisan make:controller StafController --resource
Route::resource('staf',StafController::class); 
Route::resource('divisi',DivisiController::class); 
Route::resource('jabatan',JabatanController::class); 
Route::resource('pegawai',PegawaiController::class); 
Route::get('generate-pdf', [PegawaiController::class,'generatePDF']);
Route::get('pegawai-pdf', [PegawaiController::class,'pegawaiPDF']);
Route::get('pegawai-excel', [PegawaiController::class,'pegawaiExcel']);
