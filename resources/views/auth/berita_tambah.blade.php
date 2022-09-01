@extends('auth.layout')
@section('title', 'Tambah Berita')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-berita') }}" method="POST">
                @csrf
                <input id="slug" name="slug" value="" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Judul <span class="text-danger">*</span></label>
                        <input class="form-control" id="title" name="title" value="{{ old('title') }}" autofocus required>
                        @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-sm-5">
                        <label class="form-label mb-2 text-muted" for="thumbnail">Gambar</label>
                        <input class="form-control" id="thumbnail" name="thumbnail" accept="image/*" type="file">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Kutipan awal <span class="text-danger">*</span></label>
                    <input class="mb-4" id="excerpt" type="hidden" name="excerpt">
                    <trix-editor class="form-control" spellcheck="false" input="excerpt" required>{{ old('excerpt') }}</trix-editor>
                    @error('excerpt')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Konten</label>
                    <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                    {{-- <input class="mb-4" id="content" type="hidden" name="content">
                    <trix-editor class="form-control" spellcheck="false" input="content">{{ old('content') }}</trix-editor> --}}
                    @error('content')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-4" style="width: 140px">
                        <label class="form-label text-muted" for="litepicker">Terbit <span class="text-danger">*</span></label>
                        <input name="published_at" class="form-control" id="litepicker" value="{{ old('published_at', date('Y-m-d')) }}" placeholder="Pilih tanggal" readonly>
                        <div class="litepicker-backdrop" style="display: none;" required></div>
                    </div>
                    <div class="mb-4 col-12 col-sm">
                        <label class="form-label text-muted" for="formFileMultiple">Lampiran</label>
                        <input class="form-control" id="formFileMultiple" name="attachments[]" type="file" multiple>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Kirim</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote(); 
    });
    
    $("#summernote").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });

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