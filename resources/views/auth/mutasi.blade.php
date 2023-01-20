@extends('auth.layout')
@section('title', 'Data Mutasi')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">
            <div class="display-6">Mutasi</div>
            <p class="card-text">Menampilkan semua daftar mutasi serta informasi mengenai manajemen tersebut.</p>

                {{-- <a href="{{ url('kelola-osis/create') }}" class="btn btn-primary">Tambah</a> --}}

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Peserta</th>
                        <th>WA Peserta</th>
                        <th>Wali</th>
                        <th>WA Wali</th>
                        <th>Rombel</th>
                        <th>Waktu Daftar</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mutasis as $mutasi)   
                    <tr>
                        <td>{{ $mutasi->nama_peserta }}</td>
                        <td>{{ $mutasi->wa_peserta }}</td>
                        <td>{{ $mutasi->nama_wali }}</td>
                        <td>{{ $mutasi->wa_wali }}</td>
                        <td>{{ $mutasi->rombel }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($mutasi->created_at)) }}</td>
                        <td><a href="{{ url($mutasi->lampiran) }}"><i class="material-icons">download</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
