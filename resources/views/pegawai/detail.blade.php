@extends('admin.index')
@section('content')
<section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ url('admin/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
              <h2>{{ $peg_id->nama }}</h2>
              <h3>{{ $peg_id->jabatan->nama }}</h3>
              <div class="alert alert-primary" role="alert">
                     NIP : {{ $peg_id->gender }}
                    <br/>Divis  : {{ $peg_id->divisi->nama }}
                    <br/>Jenis Kelamin   : {{ $peg_id->gender }}
                    <br/>Tempat Lahir   : {{ $peg_id->tmp_lahir }}
                    <br/>Tanggal Lahir   : {{ $peg_id->tgl_lahir }}
                    <br/>Alamat   : {{ $peg_id->alamat }}
              </div>
                  <a class="btn btn-primary" tittle="Detail Pegawai" 
                            href="{{ url('pegawai')}}">
                      <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                 </a>
            </div>
          </div>

        </div>
      </div>
</section>
@endsection