<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Divisi;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $pegawai = Pegawai::all();
        $pegawai = Pegawai::orderBy('id','DESC')->get();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //master untuk di looping di select option
        $ar_jabatan = Jabatan::all();
        $ar_divisi = Divisi::all();
        $ar_gender = ['L','P'];
        //arahkan ke input data
        return view('pegawai.form',compact('ar_jabatan','ar_divisi','ar_gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses form input pegawai
        $request->validate([
            
            'nip' => 'required|unique:pegawai|max:3',
            'nama' => 'required|max:45',
            'jabatan_id' => 'required|integer',
            'divisi_id' => 'required|integer',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|string|min:10',
            'foto' => 'nullable|string'
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')
                         ->with('success','Pegawai berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peg_id = Pegawai::find($id);
        return view('pegawai.detail',compact('peg_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data / delete
        $peg_id = Pegawai::find($id);
        Pegawai::where('id',$id)->delete();
        return redirect()->route('pegawai.index')
                            ->with('success','data Pegawai berhasil di hapus');
    }
}
