@extends('guest.layout')
@section('title', 'Not Found')

@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <div class="pt-210 pb-130 bg-linear-gradient text-center shape-parent">
            <!-- Shape-->
            <div class="shape justify-content-start"><img loading="lazy" src="{{ url('assets/img/root/404-shape-326x321.png') }}" alt="" width="326" height="321"></div><!-- Shape-->
            <div class="shape justify-content-end align-items-end"><img loading="lazy" src="{{ url('assets/img/root/404-shape-301x281.png') }}" alt="" width="301" height="281"></div><!-- Shape-->
            <div class="shape justify-content-center align-items-center mb-40"><img loading="lazy" src="{{ url('assets/img/root/404-shape-782x302.png') }}" alt="" width="782" height="302"></div>
            <div class="container">
                <h1 class="large-heading mb-20" data-show="startbox">404</h1>
                <h3 class="mb-10" data-show="startbox" data-show-delay="100">Halaman tidak ditemukan</h3>
                <p class="mb-40" data-show="startbox" data-show-delay="200">Silahkan buka halaman lain atau kembali ke beranda</p>
                <div data-show="startbox" data-show-delay="300">
                    <!-- Button--><a class="btn btn-accent-1" href="{{ url('/') }}" target="_self">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
