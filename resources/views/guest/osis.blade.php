@extends('guest.layout')
@section('title', 'Ekstrakurikuler ' . $organization->name)
@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <!-- Page title-->
        <div class="position-relative py-210">
            <div class="background">
                <div class="background-image jarallax" data-jarallax data-speed="0.8">
                    <img class="jarallax-img" loading="lazy" src="{{ url($organization->thumbnail->asset_url) }}" alt="{{ $organization->name }}"></div>
                <div class="background-color" style="--background-color: #000; opacity: .25;"></div>
            </div>
            <div class="container">
                <h1 class="text-white mb-0 text-center">OSIS</h1>
            </div>
        </div>
        <div class="pt-120 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="row justify-content-center mb-25">
                            <img class="p-5 img-thumbnail" loading="lazy" src="{{ url($organization->logo->asset_url) }}" alt="" style="width: 150px">
                        </div>
                        <h2 class="mt-0 mb-25" data-show="startbox">{{ $organization->name }}</h2>
                        <p class="m-0" data-show="startbox" data-show-delay="100">{{ $organization->description }}</p>
                    </div>
                </div>
            </div>
            <div class="container mt-65">
                <div class="bg-gray-light rounded-4 py-40 px-70">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 gy-25">
                        <div class="col">
                            <div class="d-flex flex-column" data-show="startbox">
                                <h5 class="mb-10">Pembina</h5>
                                <p class="m-0 text-truncate">{{ $organization->coach->name }}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column" data-show="startbox" data-show-delay="100">
                                <h5 class="mb-10">Ketua</h5>
                                <p class="m-0 text-truncate">{{ $organization->head_name }}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column" data-show="startbox" data-show-delay="200">
                                <h5 class="mb-10">Anggota</h5>
                                <p class="m-0 text-truncate">{{ $organization->active_members }} Orang</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column" data-show="startbox" data-show-delay="300">
                                <h5 class="mb-10">Pertemuan</h5>
                                <p class="m-0 text-truncate">
                                    @if ($schedules == null)
                                        <span class="text-muted">(Belum ditentukan)</span>
                                    @else
                                        @foreach ($schedules as $key => $schedule){!! ($key <> 0) ? ' <span class="text-muted">&bull;</span> ':'' !!}{{ $schedule }}@endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column" data-show="startbox" data-show-delay="400">
                                <h5 class="mb-10">Bagikan</h5>
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
                <div class="row mt-70 gy-30 gallery-wrapper">
                    @foreach ($files as $key => $file)                        
                    <div class="col-12 col-md-6 col-lg-4" data-show="startbox">
                        <a class="gallery-item rounded-4 overflow-hidden" href="{{ url($file->file->asset_url) }}" style="--img-height: 92%;" data-img-height>
                            <img loading="lazy" src="{{ url($file->file->asset_url) }}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($organization->instagram <> null || $organization->whatsapp <> null)
        <div class="py-70 position-relative">
            <div class="background">
                <div class="background-image jarallax" data-jarallax data-speed="0.8"><img class="jarallax-img" loading="lazy" src="{{ url('assets/img/root/call-to-action-1920x1080.jpg') }}" alt=""></div>
                <div class="background-color" style="--background-color: #0E49B5; opacity: .9;"></div>
            </div>
            <div class="container">
                <div class="row d-flex align-items-center gy-40">
                    <div class="col-xl-4">
                        <h3 class="text-white m-0" data-show="startbox">Ada pertanyaan atau ingin bergabung?</h3>
                    </div>
                    <div class="col-xl-2"></div>
                    <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                        <ul class="list-group borderless d-inline-flex ms-xl-60">
                            @if ($organization->instagram <> null)
                            <li class="list-group-item d-flex" data-show="startbox">
                                <a  class="fw-medium text-white" href="{{ 'https://instagram.com/' . $organization->instagram }}" target="_blank">
                                    <svg class="me-15 align-self-center text-white" xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor">
                                        <path fill="currentColor" d="M8.788 4.097C6.47 4.097 4.6 5.95 4.6 8.25c0 2.298 1.87 4.153 4.188 4.153 2.318 0 4.188-1.855 4.188-4.153 0-2.3-1.87-4.153-4.188-4.153Zm0 6.853c-1.498 0-2.723-1.211-2.723-2.7 0-1.49 1.221-2.7 2.723-2.7 1.502 0 2.723 1.21 2.723 2.7 0 1.489-1.225 2.7-2.723 2.7Zm5.336-7.023a.97.97 0 0 1-.977.968.97.97 0 0 1-.976-.968c0-.535.437-.969.976-.969.54 0 .977.434.977.969Zm2.774.983c-.062-1.298-.36-2.447-1.32-3.394C14.624.569 13.465.272 12.156.207c-1.349-.076-5.39-.076-6.74 0C4.113.27 2.954.565 1.995 1.512 1.035 2.46.74 3.61.674 4.906c-.076 1.338-.076 5.346 0 6.683.063 1.298.361 2.447 1.32 3.394.959.947 2.114 1.244 3.423 1.309 1.348.076 5.39.076 6.739 0 1.308-.062 2.468-.358 3.422-1.309.956-.947 1.254-2.096 1.32-3.394.076-1.337.076-5.342 0-6.68Zm-1.742 8.114a2.745 2.745 0 0 1-1.553 1.54c-1.075.423-3.627.325-4.815.325-1.188 0-3.743.095-4.815-.325a2.746 2.746 0 0 1-1.552-1.54c-.427-1.066-.329-3.596-.329-4.774 0-1.179-.094-3.712.329-4.775a2.745 2.745 0 0 1 1.552-1.54C5.048 1.512 7.6 1.61 8.788 1.61c1.188 0 3.743-.094 4.815.325a2.745 2.745 0 0 1 1.553 1.54c.426 1.066.328 3.596.328 4.775 0 1.178.098 3.712-.328 4.774Z" />
                                    </svg>{{ $organization->instagram }}
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @if ($organization->whatsapp <> null)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 text-start text-lg-end">
                        <div data-show="startbox" data-show-delay="300">
                            <!-- Button--><a class="btn btn-accent-1" href="{{ 'https://wa.me/' . $organization->whatsapp }}" target="_blank">Whatsapp</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="callToActionNext bg-linear-gradient">
            <div class="container py-120">
                <h2 class="m-0 text-center mb-90" data-show="startbox"><span class="highlight">Ekstrakurikuler</span></h2>
                <div class="row">
                    <div class="col-12">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 gy-20 gx-20">
                            <!-- Item-->
                            @foreach ($organizations as $key => $organization)
                            <div class="col" data-show="startbox" data-show-delay="{{ $key*100 }}">
                                <!-- Brand-->
                                <a class="brand rounded-2 bg-gray-light text-dark" href="{{ url('osis/' . $organization->slug) }}">
                                    <div class="py-15">
                                        <img src="{{ url($organization->logo->asset_url) }}" alt="{{ $organization->name }}" height="120">
                                    </div>
                                </a>
                            </div><!-- Item-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
