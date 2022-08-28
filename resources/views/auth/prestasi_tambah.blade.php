@extends('auth.layout')
@section('title', 'Tambah Prestasi')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-prestasi') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-12 col-md-5">
                        <label class="form-label mb-2 text-muted">Nama <span class="text-danger">*</span></label>
                        <input class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
                        @error('name')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-md-5">
                        <label class="form-label mb-2 text-muted">Deskripsi <span class="text-danger">*</span></label>
                        <input class="form-control" id="description" placeholder="cth: Juara 1" name="description" value="{{ old('description') }}" autofocus required>
                        @error('description')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted">Acara <span class="text-danger">*</span></label>
                        <input class="form-control" id="event" name="event" value="{{ old('event') }}" autofocus required>
                        @error('event')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-md-4">
                        <label class="form-label mb-2 text-muted">Tingkat <span class="text-danger">*</span></label>
                        <input class="form-control" id="level" placeholder="cth: Jabodetabek" name="level" value="{{ old('level') }}" autofocus required>
                        @error('level')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4" style="width: 140px">
                        <label class="form-label text-muted" for="litepicker">Tanggal <span class="text-danger">*</span></label>
                        <input name="published_at" class="form-control" id="litepicker" value="{{ old('published_at', date('Y-m-d')) }}" readonly>
                        <div class="litepicker-backdrop" style="display: none;" required></div>
                    </div>
                    <div class="mb-4 col-12 col-md-5">
                        <label class="form-label mb-2 text-muted" for="foto">Foto <span class="text-danger">*</span></label>
                        <input class="form-control" id="foto" name="foto" accept="image/*" type="file" required>
                        @error('foto')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let picker = new Litepicker({ 
        element: document.getElementById('litepicker') 
    });
</script>
@endsection