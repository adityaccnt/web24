@extends('auth.layout')
@section('title', 'Ubah Data Manajemen')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <form enctype="multipart/form-data" action="{{ url('kelola-manajemen/' . $user->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted">Nama <span class="text-danger">*</span></label>
                        <select name="member" class="form-select" required>
                            @foreach ($users as $userx)
                            <option value="{{ $userx->id }}" @if (old('member', $user->member_id)==$userx->id) selected @endif>{{ $userx->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 col-12 col-md-6">
                        <label class="form-label mb-2 text-muted" for="position">Tugas <span class="text-danger">*</span></label>
                        <input type="text" name="position" value="{{ $user->position->title }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection