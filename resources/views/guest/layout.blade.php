<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Situs web resmi Sekolah Menengah Atas Negeri (SMAN) 24 Jakarta. Salah satu sekolah berstatus negeri di kawasan Gelora, Jakarta Pusat.">
    <meta name="author" content="Aditya Dwi Rahmadi">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ url('public/files/64.png') }}"><!-- Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap">
    {{-- Open Graph data --}}
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:image" content="{{ url('public/files/64.png') }}" />
    <meta property="og:description" content="Situs web resmi Sekolah Menengah Atas Negeri (SMAN) 24 Jakarta. Salah satu sekolah berstatus negeri di kawasan Gelora, Jakarta Pusat." />
    {{-- Style --}}
    <link rel="stylesheet" href="{{ url('assets/vendors/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    {{-- jQuery --}}
    <script src="{{ url('assets/vendors/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/instafeed.js') }}"></script>
    {{-- Google tag (gtag.js) --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJQHTC68B1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YJQHTC68B1');
    </script>
</head>

<body class=" has-topbar">
    <!-- Topbar-->
    <div class="navbar navbar-topbar navbar-expand-xl navbar-dark navbar-absolute top-0 d-none d-xl-flex">
        <div class="container">
            {{-- <!-- Language switcher-->
            <ul class="nav navbar-nav me-100 nav-no-opacity">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bahasa Indonesia
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" fill="none">
                            <path fill="currentColor" d="m5 5-.495.495L5 5.99l.495-.495L5 5ZM.505 1.495l4 4 .99-.99-4-4-.99.99Zm4.99 4 4-4-.99-.99-4 4 .99.99Z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu rounded-2 shadow">
                        <li><a class="dropdown-item active" href="#">Bahasa Indonesia</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </li>
            </ul><!-- Contacts--> --}}
            <ul class="nav navbar-nav nav-gap-xl nav-contacts nav-no-opacity">
                <li class="nav-item"><a class="nav-link" href="tel:0215736984"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                            <path fill="currentColor" d="M16 11.98v2.408a1.604 1.604 0 0 1-1.094 1.527 1.613 1.613 0 0 1-.66.079 15.941 15.941 0 0 1-6.943-2.465A15.672 15.672 0 0 1 2.476 8.71a15.869 15.869 0 0 1-2.47-6.96A1.603 1.603 0 0 1 .96.136C1.163.047 1.384 0 1.607 0h2.414A1.61 1.61 0 0 1 5.63 1.381c.102.77.29 1.528.563 2.256a1.603 1.603 0 0 1-.362 1.694l-1.022 1.02a12.86 12.86 0 0 0 4.827 4.817l1.022-1.02a1.61 1.61 0 0 1 1.697-.36c.73.271 1.489.46 2.26.561A1.61 1.61 0 0 1 16 11.98Z" />
                        </svg>021 573-6984</a></li>
                <li class="nav-item"><a class="nav-link" href="mailto:sman24jakartapusat@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" fill="none">
                            <path fill="currentColor" d="M14 0H0l7 4.583L14 0Z" />
                            <path fill="currentColor" d="M14 9.821V2L7 6.5 0 2v7.821C0 10.47.63 11 1.4 11h11.2c.77 0 1.4-.53 1.4-1.179Z" />
                        </svg>sman24jakartapusat@gmail.com</a></li>
                <li class="nav-item"><a class="nav-link" href="https://g.page/sman24jkt?share"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" fill="none">
                            <path fill="currentColor" fill-rule="evenodd" d="M6 14s6-3.818 6-8.273a5.598 5.598 0 0 0-1.757-4.05A6.148 6.148 0 0 0 6 0a6.148 6.148 0 0 0-4.243 1.677A5.598 5.598 0 0 0 0 5.727C0 10.182 6 14 6 14Zm2-8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" clip-rule="evenodd" />
                        </svg>Jl. Lapangan Tembak No.1, Jakarta Pusat</a></li>
            </ul><!-- Socials-->
            <ul class="nav nav-gap-sm navbar-nav nav-social ms-auto nav-no-opacity align-items-center">
                {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" fill="none">
                            <path fill="currentColor" d="M5.535 2.71h1.053V.748A12.741 12.741 0 0 0 5.055.66c-1.518 0-2.557 1.023-2.557 2.903v1.73H.823v2.195h1.675v5.525h2.053V7.488h1.607l.255-2.195H4.551V3.78c0-.635.159-1.07.984-1.07Z" />
                        </svg></a></li> --}}
                <li class="nav-item"><a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="none">
                            <path fill="currentColor" d="M15.048 2.23A1.87 1.87 0 0 0 13.737.9C12.58.587 7.94.587 7.94.587S3.301.587 2.144.9A1.87 1.87 0 0 0 .832 2.23c-.31 1.172-.31 3.618-.31 3.618s0 2.445.31 3.617c.171.647.674 1.135 1.312 1.308 1.157.314 5.796.314 5.796.314s4.64 0 5.797-.314a1.842 1.842 0 0 0 1.311-1.308c.31-1.172.31-3.617.31-3.617s0-2.446-.31-3.618ZM6.423 8.068v-4.44l3.877 2.22-3.877 2.22Z" />
                        </svg></a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                            <path fill="currentColor" d="M12.854 2.986c.009.124.009.248.009.373 0 3.793-2.887 8.163-8.164 8.163a8.108 8.108 0 0 1-4.406-1.288c.23.027.453.036.693.036a5.746 5.746 0 0 0 3.562-1.226 2.874 2.874 0 0 1-2.683-1.99 3.035 3.035 0 0 0 1.297-.053 2.87 2.87 0 0 1-2.3-2.816v-.036a2.89 2.89 0 0 0 1.296.365A2.867 2.867 0 0 1 .88 2.124c0-.533.142-1.022.391-1.448a8.156 8.156 0 0 0 5.916 3.002 3.239 3.239 0 0 1-.07-.657c0-1.581 1.278-2.87 2.869-2.87.826 0 1.572.347 2.096.907a5.65 5.65 0 0 0 1.821-.693 2.862 2.862 0 0 1-1.261 1.581 5.751 5.751 0 0 0 1.652-.444 6.169 6.169 0 0 1-1.44 1.484Z" />
                        </svg></a></li> --}}
                <li class="nav-item"><a class="nav-link" href="https://instagram.com/smanegeri24jakarta/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" fill="none">
                            <path fill="currentColor" d="M7.004 3.692c-1.754 0-3.169 1.403-3.169 3.142 0 1.74 1.415 3.142 3.169 3.142 1.753 0 3.168-1.403 3.168-3.142 0-1.739-1.415-3.142-3.168-3.142Zm0 5.185a2.055 2.055 0 0 1-2.06-2.043c0-1.126.924-2.042 2.06-2.042 1.136 0 2.06.916 2.06 2.042a2.055 2.055 0 0 1-2.06 2.043Zm4.036-5.313c0 .407-.33.733-.739.733a.734.734 0 0 1-.739-.733c0-.405.331-.733.74-.733.407 0 .738.328.738.733Zm2.099.744c-.047-.982-.273-1.852-.998-2.568-.723-.716-1.6-.94-2.59-.99-1.02-.057-4.078-.057-5.098 0-.987.047-1.864.27-2.59.987-.724.717-.948 1.586-.997 2.568-.058 1.011-.058 4.044 0 5.056.047.981.273 1.85.998 2.567.725.717 1.6.94 2.589.99 1.02.058 4.078.058 5.098 0 .99-.046 1.867-.27 2.59-.99.722-.716.948-1.586.998-2.567.058-1.012.058-4.042 0-5.053Zm-1.318 6.138a2.077 2.077 0 0 1-1.175 1.165c-.813.32-2.744.246-3.642.246-.9 0-2.832.071-3.643-.246a2.076 2.076 0 0 1-1.175-1.165c-.322-.806-.248-2.72-.248-3.612 0-.891-.071-2.808.248-3.612a2.077 2.077 0 0 1 1.175-1.165c.814-.32 2.744-.246 3.643-.246.898 0 2.831-.071 3.642.246.54.213.957.626 1.175 1.165.322.807.248 2.72.248 3.612 0 .891.074 2.808-.248 3.612Z" />
                        </svg></a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" fill="none">
                            <path fill="currentColor" d="M1.662 2.728a.516.516 0 0 0-.167-.432L.262.808V.587h3.833l2.964 6.5 2.606-6.5h3.656v.221L12.265 1.82a.308.308 0 0 0-.117.295v7.438a.308.308 0 0 0 .117.295l1.031 1.012v.221H8.11v-.221l1.07-1.036c.103-.104.103-.137.103-.296v-6.01L6.31 11.062h-.402L2.452 3.518v5.056a.689.689 0 0 0 .191.58l1.39 1.684v.222H.094v-.22l1.389-1.686a.666.666 0 0 0 .178-.58V2.728Z" />
                        </svg></a></li> --}}
            </ul>
        </div>
    </div><!-- Main-->
    <div class="content-wrap ">
        <!-- Header-->
        <!-- Navbar top-->
        <nav class="navbar navbar-expand-lg navbar-top bg-white navbar-border-bottom navbar-opaque">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('public/files/logo.png') }}" height="50" alt="SMAN 24 Jakarta">
                </a>
                <a class="navbar-toggle order-4 popup-inline" href="#navbar-mobile-style-1"><span>
                    </span>
                    <span></span>
                    <span></span>
                </a>
                <ul class="nav navbar-nav order-2 ms-auto nav-no-opacity">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span>Beranda</span></a></li>
                    <li class="nav-item navbar-dropdown"><a class="nav-link" href="javascript:void(0)"><span>Profil</span></a>
                        <div class="dropdown-menu rounded-2 shadow">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="{{ url('profil') }}"><span>Sekolah</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('pendidik') }}"><span>Pendidik</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('tenaga-kependidikan') }}"><span>Tenaga Kependidikan</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('osis') }}"><span>OSIS</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('fasilitas') }}"><span>Fasilitas</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('prestasi') }}"><span>Prestasi</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('berita') }}"><span>Berita</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('galeri') }}"><span>Galeri</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('kontak') }}"><span>Kontak</span></a></li>
                </ul>
                {{-- <!-- Button--><a class="btn d-none d-sm-inline-flex btn btn-sm btn-accent-1 ms-auto ms-lg-60 me-30 me-lg-0 order-2 order-lg-3" href="{{ url('masuk') }}" target="_self">Masuk</a> --}}
            </div>
        </nav><!-- Navbar mobile-->
        <div class="navbar navbar-mobile navbar-mobile-style-1 bg-white mfp-hide" id="navbar-mobile-style-1">
            <div class="navbar-wrapper">
                <div class="navbar-head">
                    <a class="navbar-brand d-block d-md-none" href="{{ url('/') }}">
                        <img src="{{ url('public/files/logo.png') }}" height="50" alt="Logo SMAN 24 Jakarta">
                    </a>
                    <a class="navbar-toggle popup-modal-dismiss" href="#"><span></span><span></span><span></span></a></div>
                <div class="navbar-body">
                    <ul class="nav navbar-nav navbar-nav-collapse">
                        <li class="nav-item navbar-collapse"><a class="nav-link" href="{{ url('/') }}"><span>Beranda</span></a></li>
                        <li class="nav-item navbar-collapse"><a class="nav-link" href="#navbarCollapseServices" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbarCollapseServices"><span>Profil</span></a>
                            <div class="navbar-collapse-menu collapse" id="navbarCollapseServices">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item"><a class="nav-link" href="{{ url('profil') }}"><span>Sekolah</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('pendidik') }}"><span>Pendidik</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('tenaga-kependidikan') }}"><span>Tenaga Kependidikan</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('osis') }}"><span>OSIS</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('fasilitas') }}"><span>Fasilitas</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('prestasi') }}"><span>Prestasi</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item navbar-collapse"><a class="nav-link" href="{{ url('berita') }}"><span>Berita</span></a></li>
                        <li class="nav-item navbar-collapse"><a class="nav-link" href="{{ url('galeri') }}"><span>Galeri</span></a></li>
                        <li class="nav-item navbar-collapse"><a class="nav-link" href="{{ url('kontak') }}"><span>Kontak</span></a></li>
                    </ul>
                </div>
                <div class="navbar-footer">
                    <!-- Contacts-->
                    <ul class="list-group borderless font-size-15">
                        <li class="list-group-item">Email: <a href="mailto:sman24jakartapusat@gmail.com">sman24jakartapusat@gmail.com</a></li>
                        <li class="list-group-item">Telepon: <a href="tel:12023580309">021 573-6984</a></li>
                    </ul><!-- Social-->
                    <ul class="nav nav-gap-sm navbar-nav nav-social mt-30 nav-no-opacity">
                        {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="15" fill="none">
                                    <path fill="currentColor" d="M5.93 3.08h1.128V.974A13.651 13.651 0 0 0 5.416.882c-1.626 0-2.74 1.096-2.74 3.11v1.853H.882v2.353h1.794v5.92h2.2v-5.92h1.721l.274-2.353H4.875v-1.62c0-.68.171-1.146 1.056-1.146Z" />
                                </svg></a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="13" fill="none">
                                    <path fill="currentColor" d="M16.409 2.635a2.004 2.004 0 0 0-1.405-1.423c-1.24-.337-6.21-.337-6.21-.337s-4.971 0-6.21.337a2.004 2.004 0 0 0-1.406 1.423C.846 3.891.846 6.511.846 6.511s0 2.62.332 3.876a1.974 1.974 0 0 0 1.405 1.402c1.24.336 6.21.336 6.21.336s4.971 0 6.21-.336a1.974 1.974 0 0 0 1.406-1.402c.332-1.255.332-3.876.332-3.876s0-2.62-.332-3.876ZM7.168 8.89V4.132l4.154 2.38L7.168 8.89Z" />
                                </svg></a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="none">
                                    <path fill="currentColor" d="M13.986 3.445c.01.133.01.266.01.4 0 4.064-3.093 8.746-8.747 8.746a8.687 8.687 0 0 1-4.72-1.38c.247.029.485.038.742.038 1.437 0 2.76-.485 3.816-1.313a3.08 3.08 0 0 1-2.874-2.132 3.251 3.251 0 0 0 1.39-.057A3.075 3.075 0 0 1 1.137 4.73v-.038c.41.228.886.37 1.39.39a3.072 3.072 0 0 1-1.37-2.56c0-.571.152-1.095.418-1.552a8.738 8.738 0 0 0 6.34 3.217 3.47 3.47 0 0 1-.077-.704A3.073 3.073 0 0 1 10.912.409c.885 0 1.685.37 2.246.97A6.052 6.052 0 0 0 15.11.637a3.066 3.066 0 0 1-1.352 1.694 6.164 6.164 0 0 0 1.77-.476 6.609 6.609 0 0 1-1.542 1.59Z" />
                                </svg></a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="https://instagram.com/smanegeri24jakarta/"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none">
                                    <path fill="currentColor" d="M7.504 4.13c-1.88 0-3.395 1.504-3.395 3.367s1.516 3.366 3.395 3.366 3.394-1.503 3.394-3.366c0-1.863-1.515-3.366-3.394-3.366Zm0 5.556a2.202 2.202 0 0 1-2.207-2.189A2.2 2.2 0 0 1 7.504 5.31 2.2 2.2 0 0 1 9.71 7.497a2.202 2.202 0 0 1-2.207 2.189Zm4.325-5.693a.787.787 0 0 1-.792.785.787.787 0 0 1-.792-.785c0-.433.355-.785.792-.785.437 0 .792.352.792.785Zm2.248.797c-.05-1.052-.293-1.983-1.07-2.75-.774-.769-1.713-1.009-2.774-1.061C9.14.917 5.864.917 4.771.979c-1.058.05-1.997.29-2.774 1.057-.777.768-1.016 1.7-1.07 2.751-.062 1.084-.062 4.333 0 5.417.05 1.052.293 1.983 1.07 2.751.777.768 1.713 1.008 2.774 1.06 1.093.062 4.37.062 5.462 0 1.061-.05 2-.29 2.775-1.06.774-.768 1.016-1.7 1.069-2.75.062-1.085.062-4.331 0-5.415Zm-1.412 6.577a2.225 2.225 0 0 1-1.259 1.248c-.871.343-2.94.264-3.902.264-.963 0-3.034.076-3.903-.264a2.225 2.225 0 0 1-1.259-1.248c-.345-.864-.265-2.915-.265-3.87 0-.955-.077-3.009.265-3.87a2.225 2.225 0 0 1 1.259-1.248c.872-.343 2.94-.264 3.903-.264.963 0 3.034-.076 3.902.264.58.228 1.025.67 1.259 1.248.346.864.266 2.915.266 3.87 0 .955.08 3.009-.266 3.87Z" />
                                </svg></a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="none">
                                    <path fill="currentColor" d="M2.565 3.169a.553.553 0 0 0-.178-.463L1.065 1.112V.875h4.108l3.176 6.964L11.14.875h3.917v.237l-1.131 1.084a.33.33 0 0 0-.126.317v7.968a.33.33 0 0 0 .126.317l1.104 1.084v.237H9.474v-.237l1.145-1.11c.111-.112.111-.147.111-.317v-6.44L7.546 12.1h-.43L3.411 4.016v5.417a.738.738 0 0 0 .205.62l1.488 1.805v.238H.887v-.235l1.488-1.807a.714.714 0 0 0 .19-.621V3.169Z" />
                                </svg></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        @yield('main')
        <!-- Footer-->
        <footer class="bg-dark text-white py-80 footerNext">
            <div class="container">
                <div class="row d-flex align-items-center gy-25">
                    <div class="col-12 col-lg-3 text-center text-lg-start">
                        <a class="d-block" href="{{ url('/') }}">
                            <img src="{{ url('public/files/logo.png') }}" height="50" alt="Logo SMAN 24 Jakarta">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <ul class="nav text-white nav-opacity nav-gap-lg justify-content-center">
                            <li class="nav-item"><a class="nav-link" href="https://disdik.jakarta.go.id/">Dinas Pendidikan</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://ppdb.jakarta.go.id/">PPDB</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://nisn.data.kemdikbud.go.id/">Periksa NISN</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://dapo.kemdikbud.go.id/sekolah/27675379112612725F43">Dapodikmen</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://kjp.jakarta.go.id/">KJP</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3 text-lg-end text-center">
                        <ul class="nav text-white align-items-center nav-gap-md nav-no-opacity d-inline-flex">
                            {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="17" fill="none">
                                        <path fill="currentColor" d="M6.318 2.8h1.391V.202A16.842 16.842 0 0 0 5.683.088c-2.006 0-3.38 1.353-3.38 3.837v2.287H.089v2.902h2.214v7.303h2.713V9.114H7.14l.338-2.902H5.016v-2c0-.839.21-1.413 1.302-1.413Z" />
                                    </svg></a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" fill="none">
                                        <path fill="currentColor" d="M19.687 2.485A2.472 2.472 0 0 0 17.953.73C16.423.313 10.29.313 10.29.313s-6.133 0-7.662.416A2.473 2.473 0 0 0 .895 2.485c-.41 1.55-.41 4.782-.41 4.782s0 3.233.41 4.782c.226.855.89 1.5 1.734 1.729 1.53.415 7.662.415 7.662.415s6.132 0 7.662-.415a2.435 2.435 0 0 0 1.734-1.729c.41-1.549.41-4.782.41-4.782s0-3.232-.41-4.782ZM8.285 10.203v-5.87l5.126 2.934-5.126 2.936Z" />
                                    </svg></a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="none">
                                        <path fill="currentColor" d="M17.477 4.484c.012.165.012.329.012.493 0 5.014-3.817 10.792-10.792 10.792-2.149 0-4.145-.623-5.824-1.703.305.035.599.047.916.047a7.596 7.596 0 0 0 4.709-1.62 3.8 3.8 0 0 1-3.547-2.63c.235.034.47.058.717.058.34 0 .68-.047.998-.13A3.793 3.793 0 0 1 1.625 6.07v-.047a3.82 3.82 0 0 0 1.714.482 3.79 3.79 0 0 1-1.691-3.159c0-.704.188-1.35.517-1.914a10.781 10.781 0 0 0 7.82 3.97 4.282 4.282 0 0 1-.094-.87c0-2.09 1.691-3.793 3.793-3.793 1.092 0 2.079.458 2.771 1.198a7.466 7.466 0 0 0 2.408-.916c-.282.88-.881 1.62-1.668 2.09a7.604 7.604 0 0 0 2.184-.587 8.153 8.153 0 0 1-1.902 1.961Z" />
                                    </svg></a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="https://instagram.com/smanegeri24jakarta/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none">
                                        <path fill="currentColor" d="M8.788 4.097C6.47 4.097 4.6 5.95 4.6 8.25c0 2.298 1.87 4.153 4.188 4.153 2.318 0 4.188-1.855 4.188-4.153 0-2.3-1.87-4.153-4.188-4.153Zm0 6.853c-1.498 0-2.723-1.211-2.723-2.7 0-1.49 1.221-2.7 2.723-2.7 1.502 0 2.723 1.21 2.723 2.7 0 1.489-1.225 2.7-2.723 2.7Zm5.336-7.023a.97.97 0 0 1-.977.968.97.97 0 0 1-.976-.968c0-.535.437-.969.976-.969.54 0 .977.434.977.969Zm2.774.983c-.062-1.298-.36-2.447-1.32-3.394C14.624.569 13.465.272 12.156.207c-1.349-.076-5.39-.076-6.74 0C4.113.27 2.954.565 1.995 1.512 1.035 2.46.74 3.61.674 4.906c-.076 1.338-.076 5.346 0 6.683.063 1.298.361 2.447 1.32 3.394.959.947 2.114 1.244 3.423 1.309 1.348.076 5.39.076 6.739 0 1.308-.062 2.468-.358 3.422-1.309.956-.947 1.254-2.096 1.32-3.394.076-1.337.076-5.342 0-6.68Zm-1.742 8.114a2.745 2.745 0 0 1-1.553 1.54c-1.075.423-3.627.325-4.815.325-1.188 0-3.743.095-4.815-.325a2.746 2.746 0 0 1-1.552-1.54c-.427-1.066-.329-3.596-.329-4.774 0-1.179-.094-3.712.329-4.775a2.745 2.745 0 0 1 1.552-1.54C5.048 1.512 7.6 1.61 8.788 1.61c1.188 0 3.743-.094 4.815.325a2.745 2.745 0 0 1 1.553 1.54c.426 1.066.328 3.596.328 4.775 0 1.178.098 3.712-.328 4.774Z" />
                                    </svg></a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" fill="none">
                                        <path fill="currentColor" d="M2.774 3.144a.682.682 0 0 0-.22-.571L.924.606V.313H5.99L9.91 8.905 13.354.313h4.832v.293l-1.395 1.338a.407.407 0 0 0-.155.39v9.832c-.025.148.036.3.155.39l1.363 1.337v.293h-6.857v-.293l1.413-1.37c.138-.137.138-.18.138-.39V4.188l-3.93 9.973h-.53l-4.57-9.973v6.683a.91.91 0 0 0 .254.767l1.836 2.226v.293H.703v-.29l1.836-2.23a.88.88 0 0 0 .235-.766V3.144Z" />
                                    </svg></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!-- Vendors-->
        <!-- build:js -->
        <script src="{{ url('assets/vendors/js/bootstrap.js') }}"></script>
        <script src="{{ url('assets/vendors/js/imagesloaded.pkgd.js') }}"></script>
        <script src="{{ url('assets/vendors/js/isotope.pkgd.js') }}"></script>
        <script src="{{ url('assets/vendors/js/jarallax.js') }}"></script>
        <script src="{{ url('assets/vendors/js/jarallax-element.js') }}"></script>
        <script src="{{ url('assets/vendors/js/jquery.countdown.js') }}"></script>
        <script src="{{ url('assets/vendors/js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ url('assets/vendors/js/ofi.js') }}"></script>
        <script src="{{ url('assets/vendors/js/jquery.inview.js') }}"></script>
        <script src="{{ url('assets/vendors/js/swiper-bundle.js') }}"></script>
        <script src="{{ url('assets/vendors/js/gist-embed.min.js') }}"></script>
        <script src="{{ url('assets/js/helpers.js') }}"></script>
        <script src="{{ url('assets/js/controllers/show-on-scroll.js') }}"></script>
        <script src="{{ url('assets/js/controllers/countdown.js') }}"></script>
        <script src="{{ url('assets/js/controllers/isotope.js') }}"></script>
        <script src="{{ url('assets/js/controllers/navbar.js') }}"></script>
        <script src="{{ url('assets/js/controllers/stretch-column.js') }}"></script>
        <script src="{{ url('assets/js/controllers/swiper.js') }}"></script>
        <script src="{{ url('assets/js/controllers/others.js') }}"></script><!-- endbuild -->
</body>

</html>
