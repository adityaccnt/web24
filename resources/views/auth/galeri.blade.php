@extends('auth.layout')
@section('title', 'Galeri')
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

            <div class="display-6">Galeri</div>
            <p class="card-text">Menampilkan semua daftar galeri serta informasi mengenai tulisan galeri tersebut.</p>

            @if (session('run_as')<>1)
                <a href="{{ url('kelola-galeri/create') }}" class="btn btn-primary">Tambah</a>
            @endif

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>S</th>
                        <th>Judul</th>
                        <th>Bidang</th>
                        <th>Penulis</th>
                        <th data-type="date" data-format="DD-MM-YYYY">Terbit</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)   
                    <tr>
                        <td><span class="material-icons-round position-absolute text-{{ $album->status->color }}">{{ $album->status->sign }}</span></td>
                        <td>{{ $album->title }}</td>
                        <td>{{ $album->organization->name }}</td>
                        <td>{{ $album->owner->name }}</td>
                        <td>{{ $album->published_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            @if (session('run_as') == 1)
                            <a href="{{ url('kelola-galeri/' . $album->slug) }}" class="me-2"><span class="material-icons">edit</span></a>
                            @endif
                            <a href="{{ url('pratinjau-galeri/' . $album->slug) }}" target="_blank"><span class="material-icons">visibility</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
