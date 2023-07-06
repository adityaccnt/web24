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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="{{ (!isset($exception))? 'has-topbar':''; }}">
    @if(!isset($exception))
    <!-- Topbar-->
    <div class="navbar navbar-topbar navbar-expand-xl navbar-dark navbar-absolute top-0 d-none d-xl-flex">
        <div class="container">
            <ul class="nav navbar-nav nav-gap-xl nav-contacts nav-no-opacity">
                <li class="nav-item">
                    <a class="nav-link" href="tel:0215736984">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                            <path fill="currentColor" d="M16 11.98v2.408a1.604 1.604 0 0 1-1.094 1.527 1.613 1.613 0 0 1-.66.079 15.941 15.941 0 0 1-6.943-2.465A15.672 15.672 0 0 1 2.476 8.71a15.869 15.869 0 0 1-2.47-6.96A1.603 1.603 0 0 1 .96.136C1.163.047 1.384 0 1.607 0h2.414A1.61 1.61 0 0 1 5.63 1.381c.102.77.29 1.528.563 2.256a1.603 1.603 0 0 1-.362 1.694l-1.022 1.02a12.86 12.86 0 0 0 4.827 4.817l1.022-1.02a1.61 1.61 0 0 1 1.697-.36c.73.271 1.489.46 2.26.561A1.61 1.61 0 0 1 16 11.98Z" />
                        </svg>021 573-6984
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:sman24jakartapusat@gmail.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" fill="none">
                            <path fill="currentColor" d="M14 0H0l7 4.583L14 0Z" />
                            <path fill="currentColor" d="M14 9.821V2L7 6.5 0 2v7.821C0 10.47.63 11 1.4 11h11.2c.77 0 1.4-.53 1.4-1.179Z" />
                        </svg>sman24jakartapusat@gmail.com
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://g.page/sman24jkt?share">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" fill="none">
                            <path fill="currentColor" fill-rule="evenodd" d="M6 14s6-3.818 6-8.273a5.598 5.598 0 0 0-1.757-4.05A6.148 6.148 0 0 0 6 0a6.148 6.148 0 0 0-4.243 1.677A5.598 5.598 0 0 0 0 5.727C0 10.182 6 14 6 14Zm2-8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" clip-rule="evenodd" />
                        </svg>Jl. Lapangan Tembak No.1, Jakarta Pusat
                    </a>
                </li>
            </ul><!-- Socials-->
            <ul class="nav nav-gap-sm navbar-nav nav-social ms-auto nav-no-opacity align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="none">
                            <path fill="currentColor" d="M15.048 2.23A1.87 1.87 0 0 0 13.737.9C12.58.587 7.94.587 7.94.587S3.301.587 2.144.9A1.87 1.87 0 0 0 .832 2.23c-.31 1.172-.31 3.618-.31 3.618s0 2.445.31 3.617c.171.647.674 1.135 1.312 1.308 1.157.314 5.796.314 5.796.314s4.64 0 5.797-.314a1.842 1.842 0 0 0 1.311-1.308c.31-1.172.31-3.617.31-3.617s0-2.446-.31-3.618ZM6.423 8.068v-4.44l3.877 2.22-3.877 2.22Z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://instagram.com/smanegeri24jakarta/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" fill="none">
                            <path fill="currentColor" d="M7.004 3.692c-1.754 0-3.169 1.403-3.169 3.142 0 1.74 1.415 3.142 3.169 3.142 1.753 0 3.168-1.403 3.168-3.142 0-1.739-1.415-3.142-3.168-3.142Zm0 5.185a2.055 2.055 0 0 1-2.06-2.043c0-1.126.924-2.042 2.06-2.042 1.136 0 2.06.916 2.06 2.042a2.055 2.055 0 0 1-2.06 2.043Zm4.036-5.313c0 .407-.33.733-.739.733a.734.734 0 0 1-.739-.733c0-.405.331-.733.74-.733.407 0 .738.328.738.733Zm2.099.744c-.047-.982-.273-1.852-.998-2.568-.723-.716-1.6-.94-2.59-.99-1.02-.057-4.078-.057-5.098 0-.987.047-1.864.27-2.59.987-.724.717-.948 1.586-.997 2.568-.058 1.011-.058 4.044 0 5.056.047.981.273 1.85.998 2.567.725.717 1.6.94 2.589.99 1.02.058 4.078.058 5.098 0 .99-.046 1.867-.27 2.59-.99.722-.716.948-1.586.998-2.567.058-1.012.058-4.042 0-5.053Zm-1.318 6.138a2.077 2.077 0 0 1-1.175 1.165c-.813.32-2.744.246-3.642.246-.9 0-2.832.071-3.643-.246a2.076 2.076 0 0 1-1.175-1.165c-.322-.806-.248-2.72-.248-3.612 0-.891-.071-2.808.248-3.612a2.077 2.077 0 0 1 1.175-1.165c.814-.32 2.744-.246 3.643-.246.898 0 2.831-.071 3.642.246.54.213.957.626 1.175 1.165.322.807.248 2.72.248 3.612 0 .891.074 2.808-.248 3.612Z" />
                        </svg>
                    </a>
                </li>
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
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('kelulusan') }}"><span>Kelulusan</span></a></li> --}}
                </ul>
                {{-- <!-- Button--><a class="btn  d-sm-inline-flex btn btn-sm btn-accent-1 ms-auto ms-lg-60 me-30 me-lg-0 order-2 order-lg-3" href="{{ url('kelulusan') }}" target="_self">Kelulusan</a> --}}
            </div>
        </nav><!-- Navbar mobile-->
        <div class="navbar navbar-mobile navbar-mobile-style-1 bg-white mfp-hide" id="navbar-mobile-style-1">
            <div class="navbar-wrapper">
                <div class="navbar-head">
                    <a class="navbar-brand d-block d-md-none" href="{{ url('/') }}">
                        <img src="{{ url('public/files/logo.png') }}" height="50" alt="SMAN 24 Jakarta">
                    </a>
                    <a class="navbar-toggle popup-modal-dismiss" href="#"><span></span><span></span><span></span></a>
                </div>
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
                        {{-- <li class="nav-item navbar-collapse"><a class="nav-link" href="{{ url('kelulusan') }}"><span>Kelulusan</span></a></li> --}}
                    </ul>
                </div>
                <div class="navbar-footer">
                    <!-- Contacts-->
                    <ul class="list-group borderless font-size-15">
                        <li class="list-group-item">Email: <a href="mailto:sman24jakartapusat@gmail.com">sman24jakartapusat@gmail.com</a></li>
                        <li class="list-group-item">Telepon: <a href="tel:12023580309">021 573-6984</a></li>
                    </ul><!-- Social-->
                    <ul class="nav nav-gap-sm navbar-nav nav-social mt-30 nav-no-opacity">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="13" fill="none">
                                    <path fill="currentColor" d="M16.409 2.635a2.004 2.004 0 0 0-1.405-1.423c-1.24-.337-6.21-.337-6.21-.337s-4.971 0-6.21.337a2.004 2.004 0 0 0-1.406 1.423C.846 3.891.846 6.511.846 6.511s0 2.62.332 3.876a1.974 1.974 0 0 0 1.405 1.402c1.24.336 6.21.336 6.21.336s4.971 0 6.21-.336a1.974 1.974 0 0 0 1.406-1.402c.332-1.255.332-3.876.332-3.876s0-2.62-.332-3.876ZM7.168 8.89V4.132l4.154 2.38L7.168 8.89Z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://instagram.com/smanegeri24jakarta/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none">
                                    <path fill="currentColor" d="M7.504 4.13c-1.88 0-3.395 1.504-3.395 3.367s1.516 3.366 3.395 3.366 3.394-1.503 3.394-3.366c0-1.863-1.515-3.366-3.394-3.366Zm0 5.556a2.202 2.202 0 0 1-2.207-2.189A2.2 2.2 0 0 1 7.504 5.31 2.2 2.2 0 0 1 9.71 7.497a2.202 2.202 0 0 1-2.207 2.189Zm4.325-5.693a.787.787 0 0 1-.792.785.787.787 0 0 1-.792-.785c0-.433.355-.785.792-.785.437 0 .792.352.792.785Zm2.248.797c-.05-1.052-.293-1.983-1.07-2.75-.774-.769-1.713-1.009-2.774-1.061C9.14.917 5.864.917 4.771.979c-1.058.05-1.997.29-2.774 1.057-.777.768-1.016 1.7-1.07 2.751-.062 1.084-.062 4.333 0 5.417.05 1.052.293 1.983 1.07 2.751.777.768 1.713 1.008 2.774 1.06 1.093.062 4.37.062 5.462 0 1.061-.05 2-.29 2.775-1.06.774-.768 1.016-1.7 1.069-2.75.062-1.085.062-4.331 0-5.415Zm-1.412 6.577a2.225 2.225 0 0 1-1.259 1.248c-.871.343-2.94.264-3.902.264-.963 0-3.034.076-3.903-.264a2.225 2.225 0 0 1-1.259-1.248c-.345-.864-.265-2.915-.265-3.87 0-.955-.077-3.009.265-3.87a2.225 2.225 0 0 1 1.259-1.248c.872-.343 2.94-.264 3.903-.264.963 0 3.034-.076 3.902.264.58.228 1.025.67 1.259 1.248.346.864.266 2.915.266 3.87 0 .955.08 3.009-.266 3.87Z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @yield('main')
        @if(!isset($exception))
        <!-- Footer-->
        <footer class="bg-dark text-white py-80 footerNext">
            <div class="container">
                <div class="row d-flex align-items-center gy-25">
                    <div class="col-12 col-lg-3 text-center text-lg-start">
                        <a class="d-block" href="{{ url('/') }}">
                            <img src="{{ url('public/files/logo.png') }}" height="50" alt="SMAN 24 Jakarta">
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
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.youtube.com/channel/UCNLdLPqvtCzG11buswwW7Fw" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" fill="none">
                                        <path fill="currentColor" d="M19.687 2.485A2.472 2.472 0 0 0 17.953.73C16.423.313 10.29.313 10.29.313s-6.133 0-7.662.416A2.473 2.473 0 0 0 .895 2.485c-.41 1.55-.41 4.782-.41 4.782s0 3.233.41 4.782c.226.855.89 1.5 1.734 1.729 1.53.415 7.662.415 7.662.415s6.132 0 7.662-.415a2.435 2.435 0 0 0 1.734-1.729c.41-1.549.41-4.782.41-4.782s0-3.232-.41-4.782ZM8.285 10.203v-5.87l5.126 2.934-5.126 2.936Z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://instagram.com/smanegeri24jakarta/" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none">
                                        <path fill="currentColor" d="M8.788 4.097C6.47 4.097 4.6 5.95 4.6 8.25c0 2.298 1.87 4.153 4.188 4.153 2.318 0 4.188-1.855 4.188-4.153 0-2.3-1.87-4.153-4.188-4.153Zm0 6.853c-1.498 0-2.723-1.211-2.723-2.7 0-1.49 1.221-2.7 2.723-2.7 1.502 0 2.723 1.21 2.723 2.7 0 1.489-1.225 2.7-2.723 2.7Zm5.336-7.023a.97.97 0 0 1-.977.968.97.97 0 0 1-.976-.968c0-.535.437-.969.976-.969.54 0 .977.434.977.969Zm2.774.983c-.062-1.298-.36-2.447-1.32-3.394C14.624.569 13.465.272 12.156.207c-1.349-.076-5.39-.076-6.74 0C4.113.27 2.954.565 1.995 1.512 1.035 2.46.74 3.61.674 4.906c-.076 1.338-.076 5.346 0 6.683.063 1.298.361 2.447 1.32 3.394.959.947 2.114 1.244 3.423 1.309 1.348.076 5.39.076 6.739 0 1.308-.062 2.468-.358 3.422-1.309.956-.947 1.254-2.096 1.32-3.394.076-1.337.076-5.342 0-6.68Zm-1.742 8.114a2.745 2.745 0 0 1-1.553 1.54c-1.075.423-3.627.325-4.815.325-1.188 0-3.743.095-4.815-.325a2.746 2.746 0 0 1-1.552-1.54c-.427-1.066-.329-3.596-.329-4.774 0-1.179-.094-3.712.329-4.775a2.745 2.745 0 0 1 1.552-1.54C5.048 1.512 7.6 1.61 8.788 1.61c1.188 0 3.743-.094 4.815.325a2.745 2.745 0 0 1 1.553 1.54c.426 1.066.328 3.596.328 4.775 0 1.178.098 3.712-.328 4.774Z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!-- Vendors-->
        @endif
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
