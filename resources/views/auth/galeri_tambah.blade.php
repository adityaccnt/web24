@extends('auth.layout')
@section('title', 'Tambah Galeri')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-galeri') }}" method="POST">
                @csrf
                <input id="slug" name="slug" value="" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-5">
                        <label class="form-label mb-2 text-muted" for="photos">Pilih banyak gambar <span class="text-danger">*</span></label>
                        <input class="form-control" id="photos" name="photos[]" accept="image/*" type="file" multiple required>
                    </div>
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Judul <span class="text-danger">*</span></label>
                        <input class="form-control" id="title" name="title" value="{{ old('title') }}" autofocus required>
                        @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control"></textarea>
                    @error('description')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-4" style="width: 140px">
                        <label class="form-label text-muted" for="litepicker">Terbit <span class="text-danger">*</span></label>
                        <input name="published_at" class="form-control" id="litepicker" placeholder="Pilih tanggal" value="{{ old('published_at', date('Y-m-d')) }}" value="{{ old('published_at') }}" readonly>
                        <div class="litepicker-backdrop" style="display: none;" required></div>
                    </div>
                    <div class="mb-4 col-12 col-sm">
                        <label class="form-label mb-2 text-muted">Lokasi <span class="text-danger">*</span></label>
                        <input class="form-control" id="location" name="location" value="{{ old('location') }}" autofocus required>
                        @error('location')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Kirim</a>
                    {{-- <button type="submit" name="status" value="4" class="btn btn-primary">Simpan sebagai Draf</a> --}}
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

    let picker = new Litepicker({ 
        element: document.getElementById('litepicker') 
    });
</script>
@endsection