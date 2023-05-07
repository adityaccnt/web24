@extends('guest.layout')
@section('title', $posts->title)
@section('main')
<!-- Main-->
    <div class="content-wrap ">
        @if ($posts->thumbnail_id)
        <a href="{{ url($posts->thumbnail->asset_url) }}" class="image-link">
            <div class="py-240 position-relative">
                <div class="background">
                    <div class="background-image jarallax" data-jarallax data-speed="0.8">
                        <img class="jarallax-img" loading="lazy" src="{{ url($posts->thumbnail->asset_url) }}" alt="{{ $posts->title }}">
                    </div>
                </div>
                <div class="background-color" style="--background-color: #000; opacity: .5;"></div>
            </div>
        </a>
        @else
        <a href="{{ url('public/files/thumbnail_default.jpg') }}" class="image-link">
            <div class="py-240 position-relative">
                <div class="background">
                    <div class="background-image jarallax" data-jarallax data-speed="0.8">
                        <img class="jarallax-img" loading="lazy" src="{{ url('public/files/thumbnail_default.jpg') }}" alt="{{ $posts->title }}">
                    </div>
                </div>
                <div class="background-color" style="--background-color: #000; opacity: .5;"></div>
            </div>
        </a>
        @endif
        <div class="container">
            <div class="row pt-120 pb-60">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="subtitle mb-15 font-size-15 fw-medium text-gray-dark">{{ $posts->organization->name }} <span class="sep-dot"></span> {{ $posts->created_at->format('d / m / Y'); }}</div>
                    <h1 class="m-0 pe-30">{{ $posts->title }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 pb-60 text-align-justify" style="text-align: justify">
                    {!! $posts->excerpt !!}
                    <br>
                    {!! $posts->content !!}
                    
                    @if ($attachments->count() > 0)
                    <div class="form-attach-file mt-40">
                        <label class="form-attach-label" for="formFile">
                            @foreach ($attachments as $key => $attachment)
                            <a href="{!! url($attachment->file[0]->asset_url) !!}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" fill="none">
                                    <path stroke="#0096FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M24 12.251 13.126 22.953A7.162 7.162 0 0 1 8.103 25a7.162 7.162 0 0 1-5.022-2.047A6.935 6.935 0 0 1 1 18.009c0-1.854.748-3.632 2.08-4.943L13.955 2.365A4.775 4.775 0 0 1 17.303 1c1.256 0 2.46.491 3.348 1.365a4.624 4.624 0 0 1 1.387 3.295 4.624 4.624 0 0 1-1.387 3.296L9.766 19.657a2.387 2.387 0 0 1-1.675.683c-.627 0-1.23-.246-1.674-.683a2.312 2.312 0 0 1-.693-1.648c0-.618.25-1.21.693-1.647l10.046-9.875"></path>
                                </svg>Unduh lampiran {{ ++$key }}
                            </a>
                            @endforeach
                        </label>
                    </div>
                    @endif
                </div>                
            </div>

            <div class="row mb-130">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <hr class="mt-0 mb-25">
                    <div class="row justify-content-between gy-10">
                        <div class="col-auto"><span class="fw-medium font-size-16 me-8">Penulis:</span>
                            <a class="text-decoration-none text-hover-accent-1" href="#">{{ $posts->author->name }}</a>
                        </div>
                        <div class="col-auto"><span class="fw-medium font-size-16 me-10">Bagikan:</span>
                            <ul class="nav nav-gap-md d-inline-flex">
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/sharer/sharer.php?u={{ url('') . '/' . request()->path() }}"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="13" fill="none">
                                            <path fill="currentColor" d="M5.15 2.158H6.3V.091C6.102.063 5.42 0 4.625 0 2.966 0 1.83 1.077 1.83 3.054v1.821H0v2.31h1.83V13h2.244V7.186H5.83l.28-2.311H4.073V3.283c0-.668.174-1.125 1.076-1.125Z" />
                                        </svg></a></li>
                                <li class="nav-item"><a class="nav-link" href="https://twitter.com/intent/tweet?text={{ url('') . '/' . request()->path() }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="none">
                                            <path fill="currentColor" d="M14.324 3.849c.01.13.01.262.01.393 0 3.991-3.155 8.59-8.922 8.59a9.11 9.11 0 0 1-4.814-1.355c.252.028.495.038.757.038a6.434 6.434 0 0 0 3.892-1.29c-1.378-.028-2.533-.898-2.931-2.094.194.028.388.046.592.046.281 0 .563-.037.825-.103C2.296 7.794 1.22 6.58 1.22 5.111v-.037a3.25 3.25 0 0 0 1.417.383c-.844-.542-1.398-1.468-1.398-2.515 0-.56.156-1.075.427-1.524C3.21 3.251 5.53 4.448 8.13 4.578a3.288 3.288 0 0 1-.077-.692c0-1.664 1.398-3.02 3.135-3.02.903 0 1.718.365 2.291.954a6.32 6.32 0 0 0 1.99-.729 3.035 3.035 0 0 1-1.378 1.664 6.477 6.477 0 0 0 1.805-.467 6.61 6.61 0 0 1-1.572 1.56Z" />
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-linear-gradient py-120">
            <div class="container">
                <h2 class="text-center">Berita Terbaru</h2>
                <div class="swiper mt-90" data-swiper-slides="1" data-swiper-breakpoints="828:2, 1024:3" data-swiper-gap="30" data-swiper-grabcursor="true">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($lposts as $lpost)
                            <div class="swiper-slide">
                                <div data-filters="company">
                                    <!-- Blog-->
                                    @if ($lpost->thumbnail)
                                    <div class="card card-blog  card-vertical card-hover-zoom"><a class="card-img rounded-4" href="{{ url('berita/' . $lpost->slug) }}" data-img-height style="--img-height: 90%;"><span class="badge bg-dark text-white position-absolute top-0 start-0 z-index-1 mt-20 ms-20">{{ $lpost->organization->name }}</span><img loading="lazy" src="{{ url($lpost->thumbnail->asset_url) }}" alt="{{ $lpost->title }}"></a>
                                    @else
                                    <div class="card card-blog  card-vertical card-hover-zoom"><a class="card-img rounded-4" href="{{ url('berita/' . $lpost->slug) }}" data-img-height style="--img-height: 90%;"><span class="badge bg-dark text-white position-absolute top-0 start-0 z-index-1 mt-20 ms-20">{{ $lpost->organization->name }}</span><img loading="lazy" src="{{ url('public/files/thumbnail_default.jpg') }}" alt="{{ $lpost->title }}"></a>
                                    @endif
                                        <div class="card-body pt-30">
                                            <div class="card-date text-gray-dark">{{ $lpost->created_at->format('d/m/Y') }}</div><a class="card-title h4" href="{{ url('berita/' . $lpost->slug) }}">{{ $lpost->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-button-position-1 swiper-button-white shadow mt-n90"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                            <path fill="currentColor" fill-rule="evenodd" d="m3.96 6.15 5.08-4.515L7.91.365.445 7l7.465 6.635 1.13-1.27L3.96 7.85h15.765v-1.7H3.96Z" clip-rule="evenodd" />
                        </svg></div>
                    <div class="swiper-button-next swiper-button-position-1 swiper-button-white shadow mt-n90"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                            <path fill="currentColor" fill-rule="evenodd" d="m16.21 6.15-5.08-4.515 1.13-1.27L19.725 7l-7.465 6.635-1.13-1.27 5.08-4.515H.445v-1.7H16.21Z" clip-rule="evenodd" />
                        </svg></div>
                </div>
            </div>
        </div>
    </div>
@endsection
