@extends('guest.layout')
@section('title','Tenaga Kependidikan')
@section('main')
<div class="content-wrap ">
    <!-- Page title-->
    <div class="position-relative py-210">
        <div class="background">
            <div class="background-image jarallax" data-jarallax data-speed="0.8">
                <img class="jarallax-img" loading="lazy" src="{{ url('public/files/tendik.jpg') }}" alt="">
            </div>
            <div class="background-color" style="--background-color: #000; opacity: .25;"></div>
        </div>
        <div class="container">
            <h1 class="text-white mb-0 text-center">Tenaga Kependidikan</h1>
        </div>
    </div>
    <div class="pt-120 pb-130">
        <div class="container">
            <div class="row gy-70">
                @php $x = 1 @endphp
                @foreach ($teachers as $teacher)
                <div class="col-12 col-sm-6 col-lg-3" data-show="startbox" data-show-delay="{{ $x++  * 100 }}">
                    <div class="member ">
                        @if ($teacher->avatar_id == null)
                        <div class="member-image rounded-4" data-img-height style="--img-height: 114%;">
                            <img loading="lazy" src="{{ url('public/avatar/none.jpg') }}" alt="{{ $teacher->name }}">
                        </div>
                        @else
                        <a class="member-image rounded-4 image-link" href="{{ url($teacher->avatar->asset_url) }}" data-img-height style="--img-height: 114%;">
                            <img loading="lazy" src="{{ url($teacher->avatar->asset_url) }}" alt="{{ $teacher->name }}">
                        </a>
                        @endif
                        <div class="member-body">
                            <div class="member-title h4">{{ $teacher->name }}</div>
                            <div class="member-subtitle font-size-15 text-gray-dark">{{ $teacher->position->title }}</div>
                        </div>
                    </div>
                </div>
                @php if($x > 4) $x = 1 @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
