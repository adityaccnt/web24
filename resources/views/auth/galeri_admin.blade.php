@extends('auth.layout')
@section('title', 'Tambah Galeri')
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
                <input id="slug" name="slug" value="{{ $album->slug }}" type="hidden">
                <div class="row">
                    <div class="mb-4 col-12 col-sm-5">
                        <label class="form-label mb-2 text-muted" for="photos">Tambah gambar</label>
                        <input class="form-control" id="photos" name="photos[]" accept="image/*" type="file" multiple>
                    </div>
                    <div class="mb-4 col-12 col-sm-7">
                        <label class="form-label mb-2 text-muted">Judul <span class="text-danger">*</span></label>
                        <input class="form-control" id="title" name="title" value="{{ old('title', $album->title) }}" autofocus required>
                        @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label mb-2 text-muted">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control">{{ $album->description }}</textarea>
                    @error('deskripsi')
                    <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-4" style="width: 140px">
                        <label class="form-label text-muted" for="litepicker">Terbit <span class="text-danger">*</span></label>
                        <input name="published_at" class="form-control" id="litepicker" placeholder="Pilih tanggal" value="{{ $album->published_at->format('Y-m-d') }}" readonly>
                        <div class="litepicker-backdrop" style="display: none;" required></div>
                    </div>
                    <div class="mb-4 col-12 col-sm">
                        <label class="form-label mb-2 text-muted">Lokasi <span class="text-danger">*</span></label>
                        <input class="form-control" id="location" name="location" value="{{ old('location', $album->location) }}" autofocus required>
                        @error('location')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-5"/>
                <section class="text-center">
                    <div class="my-4">
                        <button type="submit" name="status" value="1" class="btn btn-{{ ($album->status_id==1)?'':'outline-' }}primary mx-1">
                            <i class="material-icons leading-icon">thumb_up</i>
                            Terbitkan
                        </button>
                        <button type="submit" name="status" value="2" class="btn btn-{{ ($album->status_id==2)?'':'outline-' }}danger mx-1">
                            <i class="material-icons leading-icon">thumb_down</i>
                            Tolak
                        </button>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<div class="mb-5 col-lg-9">
    <div class="row">
        @foreach ($galleries as $gallery)
        <div class="mb-3 col-12 col-xxl-4 col-md-6">
            <div class="card card-raised">
                <a class="ripple-gray" href="#!"><img class="card-img-top" src="{{ url($gallery->file->asset_url) }}" alt="..."></a>
                <div class="card-actions">
                    <div class="card-action-buttons row">
                        @if ($album->thumbnail_id<>$gallery->file->id)
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