@extends('auth.layout')
@section('title', 'Ubah Organisasi')
@section('main')
<div class="mb-5 col-lg-9">
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

            <form enctype="multipart/form-data" action="{{ url()->current() }}" method="POST">
                @csrf
                @method('patch')
                <input id="slug" name="slug" value="{{ old('name', $organization->slug) }}" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Nama <span class="text-danger">*</span></label>
                        <input class="form-control" id="name" name="name" value="{{ old('name', $organization->name) }}" autofocus required>
                        @error('name')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-sm-5">
                        <label class="form-label mb-2 text-muted" for="logo">Logo</label>
                        <input class="form-control" id="logo" name="logo" accept="image/*" type="file">
                    </div>
                    <div class="mb-4 col-12 col-sm-6">
                        <label class="form-label mb-2 text-muted" for="albums">Album</label>
                        <input class="form-control" id="albums" name="albums[]" accept="image/*" type="file" multiple>
                    </div>
                    <div class="mb-4 col-12 col-sm-6">
                        <label class="form-label mb-2 text-muted" for="coach">Pembina <span class="text-danger">*</span></label>
                        <select name="coach" class="form-select">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if (old('coach', $organization->coach->id)==$user->id) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="head_name">Ketua <span class="text-danger">*</span></label>
                        <input class="form-control" id="head_name" name="head_name" value="{{ old('head_name', $organization->head_name) }}" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="active_members">Anggota <span class="text-danger">*</span></label>
                        <input class="form-control" id="active_members" name="active_members" value="{{ old('active_members', $organization->active_members) }}" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="whatsapp">Whatsapp</label>
                        <input class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $organization->whatsapp) }}" type="text">
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="instagram">Instagram</label>
                        <input class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $organization->instagram) }}" type="text">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" required>{{ old('description', $organization->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="is_active"{{ $organization->is_active ? ' checked':'' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mb-5 col-lg-9">
    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="mb-3 col-12 col-xxl-4 col-md-6">
            <div class="card card-raised">
                <a class="ripple-gray" href="#!">
                    <img class="card-img-top" src="{{ url($gallery->file->asset_url) }}" alt="...">
                </a>
                <div class="card-actions">
                    <div class="card-action-buttons row">
                        @if ($organization->thumbnail_id<>$gallery->file->id)
                        <form action="{{ url()->current() }}" method="POST" class="col">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" value="{{ $gallery->file->id }}">
                            <button class="btn btn-text-primary" type="submit">Hapus</button>
                        </form>
                        <form action="{{ url()->current() }}" method="POST" class="col">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{ $gallery->file->id }}">
                            <button name="thumbnail" value="1" class="btn btn-text-primary" type="submit">Utama</button>
                        </form>
                        @else
                        <div class="col-12 text-center fst-italic text-muted">
                            Gambar utama
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    let name   = document.getElementById('name');
    let slug    = document.getElementById('slug');

    name.addEventListener('change', function() {
        if (name.value.length) {
            fetch("{{ url('post-slug') }}?title=" + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
        }else{
            slug.value = null
        }
    });
</script>
@endsection