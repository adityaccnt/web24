@extends('guest.layout')
@section('title','Prestasi')
@section('main')
<!-- Main-->
<div class="content-wrap ">
    <!-- Page title-->
    <div class="position-relative py-210">
        <div class="background">
            <div class="background-image jarallax" data-jarallax data-speed="0.8">
                <img class="jarallax-img" loading="lazy" src="{{ url('public/files/prestasi.jpg') }}" alt="Prestasi">
            </div>
            <div class="background-color" style="--background-color: #000; opacity: 0;"></div>
        </div>
        <div class="container">
            <h1 class="text-white mb-0 text-center">Prestasi</h1>
        </div>
    </div>

    <div class="pt-120 pb-130">
        <div class="container">
            <div class="row mb-90">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h3 class="m-0" data-show="startbox">
                        Prestasi hebat selalu diawali 
                        <span class="highlight-lg">dengan persiapan</span> yang hebat
                    </h3>
                </div>
            </div>
            <div class="row gy-30">
                @if ($achievements->count()>0)                    
                @foreach ($achievements as $achievement)
                <div class="col-12 col-lg-6" data-show="startbox">
                    <!-- Service card-->
                    <a href="{{ url($achievement->file->asset_url) }}" class="image-link text-decoration-none service-card lift position-relative bg-light rounded-4 overflow-hidden">
                        <div class="service-card-image flex-shrink-0" data-img-height style="--img-height: 100%;">
                            <img loading="lazy" src="{{ url($achievement->file->asset_url) }}" alt="">
                        </div>
                        <div class="service-card-body flex-grow-1">
                            <div class="service-card-text small fw-medium text-accent-1 mb-5">
                                {{ $achievement->published_at->format('d/m/Y') }}<span class="text-gray mx-5">&bull;</span>{{ $achievement->name }}
                            </div>
                            <div class="service-card-title h5 mb-5">{{ $achievement->description }}</div>
                            <div class="service-card-text mb-5 small fw-medium lh-sm text-muted">{{ $achievement->event }}</div>
                            <div class="service-card-text small">Tingkat {{ $achievement->level }}</div>
                        </div>
                    </a>
                </div>                    
                @endforeach                    
                @else
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="service-box lift position-relative rounded-4 bg-gray-light text-muted text-center col-lg-6 col-11">
                            <p class="m-0">Data prestasi belum dimasukkan</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
