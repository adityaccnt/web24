@extends('auth.layout')
@section('title', 'Konfirmasi Berita')
@section('main')
<div class="col-lg-9">
    <header class="mb-5">
        <h2 class="display-5 mb-0">Konfirmasi Berita</h2>
        <p class="lead mb-4">Memberi tindakan untuk berita baru atau ubah jika diperlukan.</p>
    </header>
    <hr class="my-5">
    <div class="card card-raised mb-5">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url()->current() }}" method="POST">
                @csrf
                @method('patch')
                <input id="slug" name="slug" value="{{ $post->slug }}" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Judul <span class="text-danger">*</span></label>
                        <input class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus required>
                        @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                        <label class="form-label mb-2 mt-4 text-muted" for="thumbnail">Gambar</span></label>
                        <input class="form-control" id="thumbnail" name="thumbnail" accept="image/*" type="file">
                    </div>
                    <div class="mb-4 col-12 col-sm-5">
                        <img src="{{ url($post->thumbnail->asset_url) }}" alt="{{ $post->title }}" class="img-thumbnail">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Kutipan awal <span class="text-danger">*</span></label>
                    <input class="mb-4" id="excerpt" type="hidden" name="excerpt">
                    <trix-editor class="form-control" spellcheck="false" input="excerpt" required>{!! old('excerpt',$post->excerpt) !!}</trix-editor>
                    @error('excerpt')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Konten</label>
                    <textarea id="summernote" name="content">{!! old('content',$post->content) !!}</textarea>
                    {{-- <trix-editor class="form-control" spellcheck="false" input="content">{!! old('content',$post->content) !!}</trix-editor> --}}
                    @error('content')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-4" style="width: 140px">
                        <label class="form-label text-muted" for="litepicker">Terbit <span class="text-danger">*</span></label>
                        <input name="published_at" class="form-control" id="litepicker" value="{{ $post->published_at->format('Y-m-d') }}" placeholder="Pilih tanggal" readonly>
                        <div class="litepicker-backdrop" style="display: none;" required></div>
                    </div>
                    <div class="mb-4 col-12 col-sm">
                        <label class="form-label text-muted" for="formFileMultiple">Lampiran</label>
                        <input class="form-control mb-2" id="formFileMultiple" name="attachments[]" type="file" multiple>

                        @if ($attachments->count() > 0)
                        <div class="chip-set">
                            @foreach ($attachments as $key => $attachment)
                            <a href="{!! url($attachment->file[0]->asset_url) !!}" target="_blank" class="col-12 mb-1">
                                <div class="chip active">
                                    <i class="chip-leading-icon material-icons">attach_file</i>
                                    Lampiran {{ ++$key }}
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @else
                        <div class="text-gray form-label">(Tidak memiliki lampiran)</div>
                        @endif
                    </div>
                </div>
                <hr class="my-5"/>
                <section class="text-center">
                    <div class="my-4">
                        <button type="submit" name="status" value="1" class="btn btn-{{ ($post->status_id==1)?'':'outline-' }}primary mx-1">
                            <i class="material-icons leading-icon">thumb_up</i>
                            Terbitkan
                        </button>
                        <button type="submit" name="status" value="2" class="btn btn-{{ ($post->status_id==2)?'':'outline-' }}danger mx-1">
                            <i class="material-icons leading-icon">thumb_down</i>
                            Tolak
                        </button>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
        
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