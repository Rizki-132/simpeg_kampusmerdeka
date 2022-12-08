@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Data Pegawai</h5>

            @if ($message = Session::get('seccess'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <a class="btn btn-primary btn-sm" tittle="Detail Pegawai" href="{{ route('pegawai.create')}}">
                <i class="bi bi-person-plus"></i>
            </a>&nbsp;
            <a class="btn btn-danger btn-sm" tittle="Export to PDF" href="{{ url('pegawai-pdf')}}">
                <i class="bi bi-file-earmark-pdf"></i>
            </a>&nbsp;
             <a class="btn btn-success btn-sm" tittle="Export to Excel" href="{{ url('pegawai-excel')}}">
                <i class="bi bi-file-earmark-excel"></i>
            </a>&nbsp;
            <br/>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">foto</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;  @endphp
                    @foreach ($pegawai as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan->nama }}</td>
                        <td>{{ $row->divisi->nama }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td width="10%">
                            @empty($row->foto)
                            <img src="{{ url('admin/img/no-foto.jpg') }}" width="55%" alt="Profile" class="rounded-circle">
                            @else
                            <img src="{{ url('admin/img') }}/{{ $row->foto }}" width="55%" alt="Profile" class="rounded-circle">
                            @endempty
                        </td>
                        <td>        
                        <form method="POST" action="{{ route('pegawai.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" tittle="Detail Pegawai" 
                            href="{{ route('pegawai.show', $row->id) }}">
                                <i class="bi bi-eye"></i> 
                            </a>

                            <a class="btn btn-warning btn-sm" tittle="Ubah Pegawai" 
                            href="{{ route('pegawai.edit', $row->id) }}">
                            <i class="bi bi-pencil-square"></i>
                            </a>

                            <button type="submit" class="btn btn-danger btn-sm" tittle="Hapus Pegawai" 
                                 onclick="return confirm('Anda Yakin data akan di hapus ?')">
                                 <i class="bi bi-trash"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>



@endsection