@extends('guest.layout')
@section('title','Berita')
@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <!-- Page title-->
        <div class="position-relative py-210">
            <div class="background">
                <div class="background-image jarallax" data-jarallax data-speed="0.8">
                    <img class="jarallax-img" loading="lazy" src="{{ url('public/files/berita.jpg') }}" alt="Berita"></div>
                <div class="background-color" style="--background-color: #000; opacity: .25;"></div>
            </div>
            <div class="container">
                <h1 class="text-white mb-0 text-center">Berita</h1>
            </div>
        </div>
        <div class="pt-80 pb-130">
            <div class="container">
                <!-- Isotope-->
                <div>
                    <ul class="nav justify-content-center isotope-filters mb-60">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/berita') }}" data-filter="marketing">Semua</a></li>
                        @foreach ($categories as $categories)
                        <li class="nav-item"><a class="nav-link" href="{{ url('berita/kategori/'. $categories->slug) }}">{{ $categories->name }}</a></li>
                        @endforeach
                    </ul>
                    <div class="row isotope-grid gy-30">
                        @foreach ($posts as $post)
                        <div class=" isotope-item col-12 col-md-6 col-lg-4">
                            <div class="card card-blog  card-vertical card-hover-zoom card-blog-bordered rounded-4 overflow-hidden bg-white">
                                @if ($post->thumbnail_id)                                    
                                <a class="card-img rounded-0 image-link" href="{{ url($post->thumbnail->asset_url) }}" data-img-height style="--img-height: 72%;">
                                    <span class="badge bg-dark text-white position-absolute top-0 start-0 z-index-1 mt-20 ms-20">{{ $post->organization->name }}</span>
                                    <img loading="lazy" src="{{ url($post->thumbnail->asset_ur) }}" alt="{{ $post->title }}" >
                                </a>
                                @else
                                <a class="card-img rounded-0 image-link" href="{{ url('public/files/thumbnail_default.jpg') }}" data-img-height style="--img-height: 72%;">
                                    <span class="badge bg-dark text-white position-absolute top-0 start-0 z-index-1 mt-20 ms-20">{{ $post->organization->name }}</span>
                                    <img loading="lazy" src="{{ url('public/files/thumbnail_default.jpg') }}" alt="{{ $post->title }}" >
                                </a>
                                @endif
                                <div class="card-body py-40 px-50 pb-50"><a class="card-title h4" href="{{ url('berita/' . $post->slug) }}">{{ $post->title }}</a>
                                    <p class="card-text">{!! $post->excerpt !!}</p>
                                    <!-- Button--><a class="btn btn-accent-1 btn-link btn-clean" href="{{ url('berita/' . $post->slug) }}" target="_self">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
