@extends('guest.layout')
@section('title', 'Pratinjau Galeri')
@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <div class="pb-130 footerPrev">
            <div class="container">
                <div class="row gy-90">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="py-lg-110 sticky-top">
                            <div class="subtitle mt-30 mb-15 font-size-15 fw-medium text-gray-dark" data-show="startbox">{{ $album->organization->name }} <span class="sep-dot"></span> {{ date('d / m / Y', strtotime($album->published_at)) }}</div>
                            <h1 class="mb-30" data-show="startbox" data-show-delay="100">{{ $album->title }}</h1>
                            <p class="mb-50" data-show="startbox" data-show-delay="200">{!! $album->description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 gallery-wrapper">
                        @foreach ($files as $file)
                        <div class="mt-30" data-show="startbox">
                            <!-- Gallery item-->
                            <a class="gallery-item rounded-4 overflow-hidden" href="{{ url($file->file->asset_url) }}" style="--img-height: 82%;" data-img-height>
                                <img loading="lazy" src="{{ url($file->file->asset_url) }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- Call to action-->
    </div>
@endsection
