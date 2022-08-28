@extends('auth.layout')
@section('title', 'Ubah Data Pendidik')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-pendidik/' . $user->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted">Nama <span class="text-danger">*</span></label>
                        <input class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus required>
                        @error('name')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted" for="avatar">Avatar</label>
                        <input class="form-control" id="avatar" name="avatar" accept="image/*" type="file">
                    </div>
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted" for="position">Tugas <span class="text-danger">*</span></label>
                        <select name="position" class="form-select" required>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}" @if (old('position', $user->position_id)==$position->id) selected @endif>{{ $position->title }}</option>
                            @endforeach
                        </select>
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