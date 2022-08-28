@extends('auth.layout')
@section('title', 'OSIS')
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

            <div class="display-6">OSIS</div>
            <p class="card-text">Menampilkan semua daftar organisasi siswa serta informasi mengenai organisasi tersebut.</p>

            @if (session('run_as') <> 1)
                <a href="{{ url('kelola-osis/create') }}" class="btn btn-primary">Tambah</a>
            @endif

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th class="d-none d-md-table-cell">Pembina</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $organization)   
                    <tr>
                        <td>{{ $organization->name }}</td>
                        <td class="d-none d-md-table-cell">{{ $organization->coach->name }}</td>
                        <td class="text-center">
                            @if (session('run_as') == 1)
                            <a href="{{ url('kelola-osis/' . $organization->slug) }}" class="me-2"><span class="material-icons">edit</span></a>
                            @endif
                            <a href="{{ url('osis/' . $organization->slug) }}" target="_blank"><span class="material-icons">visibility</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
