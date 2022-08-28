@extends('auth.layout')
@section('title', 'Ubah Kata Sandi')
@section('main')
<div class="mb-5 col-lg-6 col-md-8 col-12">
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
            
            <form enctype="multipart/form-data" action="{{ url('kata-sandi') }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="mb-4 col-12">
                        <label class="form-label mb-2 text-muted">Kata sandi baru <span class="text-danger">*</span></label>
                        <input name="password" class="form-control" minlength="8" maxlength="16" placeholder="8 - 16 Karakter" required autofocus>
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