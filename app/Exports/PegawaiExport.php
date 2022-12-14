<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PegawaiExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pegawai::all();
        $ar_pegawai = DB::table('pegawai')
        ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
        ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
        ->select('pegawai.nip','pegawai.nama','jabatan.nama AS posisi','divisi.nama AS bagian','pegawai.gender',
                'pegawai.tmp_lahir','pegawai.tgl_lahir','pegawai.alamat')
        ->get();
        return $ar_pegawai;

    }

    public function headings(): array
    {
        return ["NIP", "Nama","Jabatan","Divisi","Gender","Tempat Lahir",
                "Tanggal Lahir","Alamat"];
    }
}
