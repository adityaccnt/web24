@extends('guest.layout')
@section('title', $album->title)
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
                {{-- <div data-show="startbox">
                    <!-- Page navigation-->
                    <div class="page-navigation mt-130">
                        <a class="page-navigation-prev h4 rounded-3 bg-light" href="project-single-02.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                                <path stroke="currentColor" stroke-width="1.7" d="M20 7H2m0 0 6.75-6M2 7l6.75 6" />
                            </svg>
                            <span class="d-none d-lg-block">Modern Architecture</span>
                        </a>
                        <a class="page-navigation-all shadow" href="projects-01.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                                <path fill="currentColor" d="M0 0h7v7H0V0ZM11 0h7v7h-7V0ZM11 11h7v7h-7v-7ZM0 11h7v7H0v-7Z" />
                            </svg>
                        </a>
                        <a class="page-navigation-next h4 rounded-3 bg-light" href="project-single-01.html">
                            <span class="d-none d-lg-block">Product Marketing</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                                <path stroke="currentColor" stroke-width="1.7" d="M0 7h18m0 0-6.75-6M18 7l-6.75 6" />
                            </svg>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div><!-- Call to action-->
    </div>
@endsection
