@extends('auth.layout')
@section('title', 'Prestasi')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">

            @if (session()->has('success'))                
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <div class="row">
                    <div class="material-icons me-2" style="width: 24px">check_circle</div>
                    <div class="col">{{ session('success') }}</div>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (session()->has('failed'))                
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <div class="row">
                    <div class="material-icons me-2" style="width: 24px">error</div>
                    <div class="col">{{ session('failed') }}</div>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="display-6">Prestasi</div>
            <p class="card-text">Menampilkan semua daftar prestasi siswa serta informasi mengenai prestasi tersebut.</p>

            <a href="{{ url('kelola-prestasi/create') }}" class="btn btn-primary">Tambah</a>

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th data-type="date" data-format="DD-MM-YYYY" class="d-none d-md-table-cell">Tanggal</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($achievements as $achievement)   
                    <tr>
                        <td>{{ $achievement->name }}</td>
                        <td class="d-none d-md-table-cell">{{ $achievement->published_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a href="{{ url('kelola-prestasi/' . $achievement->id) . '/edit' }}" class="me-2"><span class="material-icons">edit</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
