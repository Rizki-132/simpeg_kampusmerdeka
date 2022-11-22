@extends('admin.index')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Data Divisi</h5>

            <a class="btn btn-primary btn-sm" tittle="Detail Pegawai" 
                            href="{{ route('divisi.create')}}">
                            <i class="bi bi-plus-circle"></i>
            </a>
            <br/>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;  @endphp
                    @foreach ($divisi as $row)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $row->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>



@endsection