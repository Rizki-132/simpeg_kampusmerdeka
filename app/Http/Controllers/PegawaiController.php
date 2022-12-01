<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Divisi;
use DB;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        // Pegawai::create($request->all());
        //-------------Apakah user ingin upload foto------
        if(!empty($request->foto)){
            $fileName = $request->nip.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName(); untuk nama original di foto
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        else{
            $fileName='';
        }
        //lakukan insert data dari request form
        
        DB::table('pegawai')->insert(
            [
                'nip'=>$request->nip,
                'nama'=>$request->nama,
                'jabatan_id'=>$request->jabatan_id,
                'divisi_id'=>$request->divisi_id,
                'gender'=>$request->gender,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                'created_at'=>now()
            ]);

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
        $peg_id = Pegawai::find($id);
        return view('pegawai.form_edit',compact('peg_id'));
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
         //proses form update pegawai
         $request->validate([
            
            // 'nip' => 'required|unique:pegawai|max:3',
            'nama' => 'required|max:45',
            'jabatan_id' => 'required|integer',
            'divisi_id' => 'required|integer',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|string|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

       
        //-------------foto lama apabila user ingin ganti foto------
        $foto = DB::table('pegawai')->select('foto')->where('id',$id)->get();
        //dd($foto);
        foreach ($foto as $f ) {
            $namaFileFotoLama = $f->foto;
        }

        //apakah user ingin ganti foto lama
        if(!empty($request->foto)){
            // jika ada foto lama, maka hapus terlebih dahulu foto lamanya
            if(!empty($peg_id->foto)) unlink('admin/img/'.$peg_id->foto); 
            //proses foto lama di ganti dengan foto baru
            $fileName = 'foto-'.$request->nip.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName(); untuk nama original di foto
            $request->foto->move(public_path('admin/img'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama ;
        }

        //update data dari form edit
        DB::table('pegawai')->where('id',$id)->update(
            [
                // 'nip'=>$request->nip,
                'nama'=>$request->nama,
                'jabatan_id'=>$request->jabatan_id,
                'divisi_id'=>$request->divisi_id,
                'gender'=>$request->gender,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'alamat'=>$request->alamat,
                'foto'=>$fileName,
                'created_at'=>now()
            ]);

        return redirect('/pegawai'.'/'.$id)
                         ->with('success','Data Pegawai berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data , hapus dulu fisik file fotonya / jika ada
        $peg_id = Pegawai::find($id);
        if(!empty($peg_id->foto)) unlink('admin/img/'.$peg_id->foto); 
        //menghapus data / delete
        Pegawai::where('id',$id)->delete();
        return redirect()->route('pegawai.index')
                            ->with('success','data Pegawai berhasil di hapus');
    }
}
