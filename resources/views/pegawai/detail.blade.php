@extends('admin.index')
@section('content')
<section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            @if ($message = Session::get('seccess'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
            @endif
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @empty($peg_id->foto)
              <img src="{{ url('admin/img/no-foto.jpg') }}" alt="Profile" class="rounded-circle">
              @else
              <img src="{{ url('admin/img') }}/{{ $peg_id->foto }}" alt="Profile" class="rounded-circle">
              @endempty

              <h2>{{ $peg_id->nama }}</h2>
              <h3>{{ $peg_id->jabatan->nama }}</h3>
              <div class="alert alert-primary" role="alert">
                     NIP : {{ $peg_id->nip }}
                    <br/>Divis  : {{ $peg_id->divisi->nama }}
                    <br/>Jenis Kelamin   : {{ $peg_id->gender }}
                    <br/>Tempat Lahir   : {{ $peg_id->tmp_lahir }}
                    <br/>Tanggal Lahir   : {{ $peg_id->tgl_lahir }}
                    <br/>Alamat   : {{ $peg_id->alamat }}
              </div>
                  <a class="btn btn-primary" title="Detail Pegawai" 
                            href="{{ url('pegawai') }}">
                            <i class="bi bi-arrow-left-square"></i>
                 </a>
            </div>
          </div>

        </div>
      </div>
</section>
@endsection