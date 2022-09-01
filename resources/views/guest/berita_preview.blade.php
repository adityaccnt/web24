@extends('guest.layout')
@section('title', $posts->title)
@section('main')
<!-- Main-->
    <div class="content-wrap ">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
