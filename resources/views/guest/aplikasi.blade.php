@extends('guest.layout')
@section('title', 'Aplikasi')
@section('main')
<div class="pt-120 pb-130 bg-linear-gradient testimonialsPrev">
    <div class="container">
        <div class="row mb-90">
            <div class="col-lg-6 offset-lg-3 text-center">
                <h3 class="mb-25 px-lg-10 animated" data-show="startbox" style="transform: translateY(0px); transition-duration: 500ms; opacity: 1;">
                    <span class="highlight-lg">Transformasi digital.</span> <br>Sekolah optimal. Hasil maksimal.
                </h3>
            </div>
            <div class="col-lg-6 offset-lg-3 text-center">
                <p class="m-0 px-lg-50 animated" data-show="startbox" data-show-delay="100" style="transform: translateY(0px); transition-duration: 500ms; opacity: 1;">
                    Aplikasi kami hanya diaktifkan sesuai kebutuhan tapi mereka bisa siap digunakan dalam hitungan detik!
                </p>
            </div>
        </div>
        <div class="row gy-30">
            @foreach ($servers as $key => $server)
            <div class="col-12 col-md-6 col-lg-3 animated" data-show="startbox" data-show-delay="{{ $key * 100 }}" style="transform: translateY(0px); transition-duration: 500ms; opacity: 1;">
                <div class="service-box lift position-relative rounded-4 bg-white text-center">
                    <div class="circle-icon text-white {{ ($server->status_id==1)?'bg-accent-2':'bg-gray'; }} mb-30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M39 20.5C39 30.717 30.717 39 20.5 39M39 20.5C39 10.283 30.717 2 20.5 2M39 20.5H2M20.5 39C10.283 39 2 30.717 2 20.5M20.5 39a28.305 28.305 0 0 0 7.4-18.5A28.305 28.305 0 0 0 20.5 2m0 37a28.305 28.305 0 0 1-7.4-18.5A28.305 28.305 0 0 1 20.5 2M2 20.5C2 10.283 10.283 2 20.5 2"></path>
                        </svg>
                    </div>
                    <h4 class="service-box-title mb-15">{{ $server->name }}</h4>
                    <p class="service-box-text font-size-15 mb-30">{{ ($server->status_id==1)?'Online':'Offline'; }}</p>
                    <a class="service-box-arrow stretched-link mt-30" href="{{ $server->url }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                            <path stroke="currentColor" stroke-width="1.7" d="M0 7h18m0 0-6.75-6M18 7l-6.75 6"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
