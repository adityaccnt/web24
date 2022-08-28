@extends('auth.layout')
@section('title', 'Tambah Organisasi')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-berita') }}" method="POST">
                @csrf
                <input id="slug" name="slug" value="" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Nama <span class="text-danger">*</span></label>
                        <input class="form-control" id="title" name="title" value="{{ old('title') }}" autofocus required>
                        @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-sm-5">
                        <label class="form-label mb-2 text-muted" for="thumbnail">Logo <span class="text-danger">*</span></label>
                        <input class="form-control" id="thumbnail" name="thumbnail" accept="image/*" type="file" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-6">
                        <label class="form-label mb-2 text-muted" for="album">Album <span class="text-danger">*</span></label>
                        <input class="form-control" id="album" name="album" accept="image/*" type="file" multiple required>
                    </div>
                    <div class="mb-4 col-12 col-sm-6">
                        <label class="form-label mb-2 text-muted" for="coach">Pembina <span class="text-danger">*</span></label>
                        <input class="form-control" id="coach" name="coach" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="head_name">Ketua <span class="text-danger">*</span></label>
                        <input class="form-control" id="head_name" name="head_name" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="head_name">Anggota <span class="text-danger">*</span></label>
                        <input class="form-control" id="head_name" name="head_name" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="head_name">Whatsapp <span class="text-danger">*</span></label>
                        <input class="form-control" id="head_name" name="head_name" type="text" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-3">
                        <label class="form-label mb-2 text-muted" for="head_name">Instagram <span class="text-danger">*</span></label>
                        <input class="form-control" id="head_name" name="head_name" type="text" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Kirim</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let title   = document.getElementById('title');
    let slug    = document.getElementById('slug');

    title.addEventListener('change', function() {
        if (title.value.length) {
            fetch("{{ url('post-slug') }}?title=" + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
        }else{
            slug.value = null
        }
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    let picker = new Litepicker({ 
        element: document.getElementById('litepicker') 
    });
</script>
@endsection