@extends('guest.layout')
@section('title','Fasilitas')
@section('main')
<!-- Main-->
<div class="content-wrap ">
    <!-- Page title-->
    <div class="position-relative py-210">
        <div class="background">
            <div class="background-image jarallax" data-jarallax data-speed="0.8">
                <img class="jarallax-img" loading="lazy" src="{{ url('public/files/fasilitas.jpg') }}" alt="Fasilitas">
            </div>
            <div class="background-color" style="--background-color: #000; opacity: .25;"></div>
        </div>
        <div class="container">
            <h1 class="text-white mb-0 text-center">Fasilitas</h1>
        </div>
    </div>
    <div class="pt-80 pb-130">
        <div class="container">
            <!-- Isotope-->
            <div class="isotope">
                <div class="row isotope-grid gy-30">
                    @foreach ($facilities as $facility)
                    <div class=" isotope-item col-12 col-md-6 col-lg-4" data-filters="architecture">
                        <div class="card card-blog  card-vertical card-hover-zoom card-blog-bordered rounded-4 overflow-hidden bg-white">
                            @if ($facility->asset_url <> null)
                            <a class="card-img rounded-0 image-link" href="{{ url($facility->file->asset_url) }}" data-img-height style="--img-height: 72%;">
                                <img loading="lazy" src="{{ url($facility->file->asset_url) }}" alt="{{ $facility->name }}">
                            </a>                            
                            <div class="card-body py-30 text-center">
                                <a class="card-title h4" href="single-post.html">{{ $facility->name }}</a>
                            </div>
                            @else
                            <div class="card-img rounded-0"data-img-height style="--img-height: 72%;">
                                <img loading="lazy" src="{{ url('public/avatar/none.jpg') }}" alt="{{ $facility->name }}">
                            </div>                                
                            <div class="card-body py-30 text-center">
                                <div class="card-title h4">{{ $facility->name }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
