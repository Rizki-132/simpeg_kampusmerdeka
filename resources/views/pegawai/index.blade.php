@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Data Pegawai</h5>

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
                        <th scope="row">{{ $no }}</th>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jabatan_id }}</td>
                        <td>{{ $row->divisi_id }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->foto }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" tittle="Detail Pegawai" 
                            href="{{ route('pegawai.show', $row->id) }}">
                                <i class="bi bi-eye"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>



@endsection