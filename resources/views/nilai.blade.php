<h3 align="center"> Daftar Nilai Mahasiswa</h3>
<table border="2" align="center" cellpading="1" cellspacing="0" >
    <thead>
        @foreach ($judul as $jdl)
        <th>{{ $jdl }}</th>
        @endforeach
    </thead>
    <tbody>
        @foreach ($siswa as $mhs)
            @php
                $ket = ($mhs['nilai'] > 60 ? 'Lulus' : 'Gagal');
                $warna =($no % 2 == 1) ? 'blue' : 'yellow';
            @endphp

            {{-- tentukan Grade --}}

            @if ($mhs['nilai'] > 85 && $mhs['nilai'] <= 100 ) @php $grade = 'A' @endphp
            @elseif ($mhs['nilai'] > 75 && $mhs['nilai'] <= 85 )@php $grade = 'B' @endphp
            @elseif ($mhs['nilai'] > 65 && $mhs['nilai'] <= 75 )@php $grade = 'C' @endphp
            @elseif ($mhs['nilai'] > 55 && $mhs['nilai'] <= 65 )@php $grade = 'D' @endphp
            @elseif ($mhs['nilai'] > 40 && $mhs['nilai'] <= 55 )@php $grade = 'E' @endphp
            @endif

            {{-- Tentukan Predikat --}}
            @switch ($grade)
                @case ('A') 
                    @php $predikat = 'Memuaskan' @endphp
                    @break
                @case ('B')  
                    @php $predikat = 'Bagus' @endphp
                    @break
                @case ('C')  
                    @php $predikat = 'Cukup' @endphp
                    @break
                @case ('D')  
                    @php $predikat = 'Kurang' @endphp
                    @break
                @case ('E')  
                    @php $predikat = 'Buruk' @endphp
                    @break
                @default @php $predikat = '' @endphp @break
            @endswitch

         <tr bgcolor="{{ $warna }}">
            <td>{{ $no++}}</td>
            <td>{{ $mhs['nama'] }}</td>
            <td>{{ $mhs['nilai'] }}</td>
            <td>{{ $grade }}</td>
            <td>{{ $predikat }}</td>
            <td>{{ $ket }}</td>
         </tr>
        @endforeach
    </tbody>
</table>