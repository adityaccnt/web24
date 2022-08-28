@extends('guest.layout')
@section('title', $posts->title)
@section('main')
<!-- Main-->
    <div class="content-wrap ">
        <div class="py-240 position-relative">
            <div class="background">
                <div class="background-image jarallax" data-jarallax data-speed="0.8"><img class="jarallax-img" loading="lazy" src="{{ url($posts->thumbnail->asset_url) }}" alt="{{ $posts->title }}"></div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-120 pb-60">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="subtitle mb-15 font-size-15 fw-medium text-gray-dark">{{ $posts->organization->name }} <span class="sep-dot"></span> {{ $posts->created_at->format('d / m / Y'); }}</div>
                    <h1 class="m-0 pe-30">{{ $posts->title }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 pb-60">
                    {!! $posts->excerpt !!}
                    <hr class="py-5" style="border-style: dashed">
                    {!! $posts->content !!}
                </div>
            </div>

            <div class="row mb-130">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <hr class="mt-0 mb-25">
                    <div class="row justify-content-between gy-10">
                        <div class="col-auto"><span class="fw-medium font-size-16 me-8">Penulis:</span>
                            <a class="text-decoration-none text-hover-accent-1" href="#">{{ $posts->author->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
