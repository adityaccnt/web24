@extends('auth.layout')
@section('title', 'Berita')
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

            <div class="display-6">Berita</div>
            <p class="card-text">Menampilkan semua daftar berita serta informasi mengenai tulisan berita tersebut.</p>

            @if (session('run_as')<>1)
                <a href="{{ url('kelola-berita/create') }}" class="btn btn-primary">Tambah</a>
            @endif

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>S</th>
                        <th class="d-none d-lg-table-cell">Judul</th>
                        <th class="d-none d-md-table-cell">Bidang</th>
                        <th class="d-none d-lg-table-cell">Penulis</th>
                        <th data-type="date" data-format="DD-MM-YYYY">Terbit</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)   
                    <tr>
                        <td><span class="material-icons-round position-absolute text-{{ $post->status->color }}">{{ $post->status->sign }}</span></td>
                        <td class="d-none d-lg-table-cell">{{ $post->title }}</td>
                        <td class="d-none d-md-table-cell">{{ $post->organization->name }}</td>
                        <td class="d-none d-lg-table-cell">{{ $post->author->name }}</td>
                        <td>{{ $post->published_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            @if (session('run_as') == 1)
                            <a href="{{ url('kelola-berita/' . $post->slug) }}" class="me-2"><span class="material-icons">edit</span></a>
                            @endif
                            <a href="{{ url('pratinjau-berita/' . $post->slug) }}" target="_blank"><span class="material-icons">visibility</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
