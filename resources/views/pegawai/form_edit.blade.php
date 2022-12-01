@extends('admin.index')
@section('content')
@php
$ar_gender = ['L','P'];
//Select option divisi dan jabatan 
$ar_divisi = App\Models\Divisi::all();
$ar_jabatan = App\Models\Jabatan::all();
@endphp
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form input Pegawai</h5>
              <br/>
               
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Oops!!</strong> Terjadi kesalahan
                saat input
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
              @endif
              <!-- General Form Elements -->
              <form class="row g-3" method="POST" action="{{route('pegawai.update',$peg_id->id )}}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" name="nip" value="{{$peg_id->nip}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" value="{{$peg_id->nama}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jabatan_id" aria-label="Default select example">
                      <option selected>-- Plih Jabatan --</option>
                      @foreach ($ar_jabatan as $jab)
                      @php $sel = ( $jab->id == $peg_id->jabatan_id )? 'selected': ''; @endphp
                      <option value="{{ $jab->id }}" {{ $sel }}>{{ $jab->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="divisi_id" aria-label="Default select example">
                      <option selected>-- Plih Jabatan --</option>
                      @foreach ($ar_divisi as $div)
                      @php $sel = ( $div->id == $peg_id->divisi_id )? 'selected': ''; @endphp
                      <option value="{{ $div->id }}" {{ $sel }}>{{ $div->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    @foreach ($ar_gender as $gender)
                    @php $cek = ( $gender == $peg_id->gender )? 'checked': ''; @endphp
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="{{ $gender }}" {{ $cek }}>
                      <label class="form-check-label" for="gridRadios1">
                        {{ $gender }}
                      </label>
                    </div>
                    @endforeach
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" name="tmp_lahir" value="{{$peg_id->tmp_lahir}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" value="{{$peg_id->tgl_lahir}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" style="height: 100px">{{$peg_id->alamat}}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control"  type="file" name="foto">
                    @if(!empty($peg_id->foto)) <img src="{{ url('admin/img') }}/{{ $peg_id->foto }}" width="10%" class="img-thumbnail">
                    <br/>{{ $peg_id->foto }}
                    @endif
                  </div>
                </div>
               
             
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary btn-sm" title="simpan pegawai">
                    <i class="bi bi-cloud-download-fill">Ubah</i>
                    </button>
                    &nbsp;
                    <a class="btn btn-warning btn-sm" href="{{url('pegawai')}}" type="submit" class="btn btn-primary" title="Kembali">
                      <i class="bi bi-arrow-right-circle">Kembali</i>
                    </a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection