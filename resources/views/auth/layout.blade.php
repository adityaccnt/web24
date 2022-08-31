
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Aditya Dwi Rahmadi" />
        <title>@yield('title')</title>
        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ url('public/files/64.png') }}"><!-- Fonts-->
        {{-- Icons --}}
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
        {{-- DataTables --}}
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        {{-- Fonts--> --}}
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
        {{-- Load main stylesheet --}}
        <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ url('css/trix.css') }}">
        {{-- Script --}}
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
        @if (Request::is('kelola-berita*'))
        {{-- summernote --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        {{-- Trix --}}
        <script type="text/javascript" src="{{ url('js/trix.js') }}"></script>
        <style>trix-toolbar [data-trix-button-group="file-tools"]{ display: none;}</style>
        @endif
    </head>
    <body class="nav-fixed bg-light">
        <nav class="top-app-bar navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid px-4">
                <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
                <div class="navbar-brand me-auto">@yield('title')</div>
                <div class="d-flex align-items-center mx-3 me-lg-0">
                    <div class="d-flex">
                        {{-- <div class="dropdown dropdown-notifications">
                            <button class="btn btn-lg btn-icon dropdown-toggle me-3" id="dropdownMenuMessages" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">mail_outline</i></button>
                        </div>
                        <div class="dropdown dropdown-notifications">
                            <button class="btn btn-lg btn-icon dropdown-toggle me-3" id="dropdownMenuNotifications" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">notifications</i></button>
                        </div> --}}
                        <div class="dropdown">
                            <button class="btn btn-lg btn-icon dropdown-toggle" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">person</i></button>
                            <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                                {{-- <li>
                                    <a class="dropdown-item" href="#!">
                                        <i class="material-icons leading-icon">person</i>
                                        <div class="me-3">Profil</div>
                                    </a>
                                </li> --}}
                                <li>
                                    <a class="dropdown-item" href="{{ url('kata-sandi') }}">
                                        <i class="material-icons leading-icon">settings</i>
                                        <div class="me-3">Pengaturan</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('https://wa.me/6281315003453') }}" target="_blank">
                                        <i class="material-icons leading-icon">help</i>
                                        <div class="me-3">Bantuan</div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('keluar') }}">
                                        <i class="material-icons leading-icon">logout</i>
                                        <div class="me-3">Keluar</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="layoutDrawer">
            <div id="layoutDrawer_nav">
                <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
                    <div class="drawer-menu">
                        <div class="nav">

                            {{-- <div class="drawer-menu-heading d-sm-none">Account</div>
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                                Notifications
                            </a>
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                                Messages
                            </a> --}}
                            {{-- <div class="drawer-menu-divider d-sm-none "></div> --}}
                            <div class="drawer-menu-heading"></div>
                            <a class="nav-link{{ Request::is('dasbor') ? ' active' : '' }}" href="{{ url('/dasbor') }}">
                                <div class="nav-link-icon"><i class="material-icons">bar_chart</i></div>
                                Dasbor
                            </a>
                            <a class="nav-link{{ Request::is('kelola-berita*') ? ' active' : '' }}" href="{{ url('kelola-berita') }}">
                                <div class="nav-link-icon"><i class="material-icons">newspaper</i></div>
                                Berita
                            </a>
                            <a class="nav-link{{ Request::is('kelola-galeri*') ? ' active' : '' }}" href="{{ url('kelola-galeri') }}">
                                <div class="nav-link-icon"><i class="material-icons">image</i></div>
                                Galeri
                            </a>
                            @if (session('run_as')==1)
                            <div class="drawer-menu-divider mt-3"></div>
                            <div class="drawer-menu-heading py-1"></div>
                            <a class="nav-link{{ Request::is('kelola-pendidik*') ? ' active' : '' }}" href="{{ url('/kelola-pendidik') }}">
                                <div class="nav-link-icon"><i class="material-icons">school</i></div>
                                Pendidik
                            </a>
                            <a class="nav-link{{ Request::is('kelola-tendik*') ? ' active' : '' }}" href="{{ url('/kelola-tendik') }}">
                                <div class="nav-link-icon"><i class="material-icons">group</i></div>
                                Tenaga Kependidikan
                            </a>
                            <a class="nav-link{{ Request::is('kelola-manajemen*') ? ' active' : '' }}" href="{{ url('/kelola-manajemen') }}">
                                <div class="nav-link-icon"><i class="material-icons">support_agent</i></div>
                                Manajemen
                            </a>
                            <a class="nav-link{{ Request::is('kelola-osis*') ? ' active' : '' }}" href="{{ url('/kelola-osis') }}">
                                <div class="nav-link-icon"><i class="material-icons">account_tree</i></div>
                                OSIS
                            </a>
                            <a class="nav-link{{ Request::is('kelola-fasilitas*') ? ' active' : '' }}" href="{{ url('/kelola-fasilitas') }}">
                                <div class="nav-link-icon"><i class="material-icons">airline_seat_recline_extra</i></div>
                                Fasilitas
                            </a>
                            <a class="nav-link{{ Request::is('kelola-prestasi*') ? ' active' : '' }}" href="{{ url('/kelola-prestasi') }}">
                                <div class="nav-link-icon"><i class="material-icons">military_tech</i></div>
                                Prestasi
                            </a>
                            {{-- <a class="nav-link{{ Request::is('kelola-testimoni*') ? ' active' : '' }}" href="{{ url('/kelola-testimoni') }}">
                                <div class="nav-link-icon"><i class="material-icons">chat_bubble</i></div>
                                Testimoni
                            </a> --}}
                            {{-- <a class="nav-link{{ Request::is('kelola-profil*') ? ' active' : '' }}" href="{{ url('/kelola-profil') }}">
                                <div class="nav-link-icon"><i class="material-icons">domain</i></div>
                                Profil Sekolah
                            </a> --}}
                            {{-- <a class="nav-link{{ Request::is('kelola-akun*') ? ' active' : '' }}" href="{{ url('/kelola-akun') }}">
                            <div class="nav-link-icon"><i class="material-icons">manage_accounts</i></div>
                                Akun
                            </a> --}}
                            @endif
                        </div>
                    </div>
                    <div class="drawer-footer border-top">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-muted">account_circle</i>
                            <div class="ms-3 col-10">
                                <div class="caption text-truncate">{{ auth()->user()->name }}</div>
                                <div class="text-truncate">{{ session('as_org') }}</div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutDrawer_content">
                <main>
                    <div class="container-xl p-5">
                        @yield('main')
                    </div>
                </main>
                <footer class="py-4 mt-auto border-top" style="min-height: 74px">
                    <div class="container-xl px-5">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
                            <div class="me-sm-2">Copyright &copy; SMAN 24 Jakarta 2022</div>
                            <div class="d-flex ms-sm-2">
                                {{-- <a class="text-decoration-none" href="#!">Privacy Policy</a>
                                <div class="mx-1">&middot;</div> --}}
                                ADR
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Load Bootstrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ url('js/material.js') }}"></script>
        <script src="{{ url('js/scripts.js') }}"></script>
        <!--  Load Chart.js via CDN-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous"></script>
        <!--  Load Chart.js customized defaults-->
        <script src="{{ url('js/charts/chart-defaults.js') }}"></script>
        @if (Request::is('dasbor') && $files_total > 0)
        <script>
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Gambar', 'Dokumen','Lain-lain'],
                    datasets: [{
                        data: [{{ $files_img }}, {{ $files_pdf }}, {{ $files_other }}],
                        backgroundColor: [primaryColor, infoColor, secondaryColor], //warningColor
                    }],
                },
            });
            </script>
        @endif

        @if (Request::is('dasbor') && $posts_total > 0)            
        <script>
            var ctx = document.getElementById('dashboardBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                            label: 'Tahun Lalu',
                            backgroundColor: primaryColorOpacity50,
                            borderColor: primaryColorOpacity50,
                            borderRadius: 4,
                            maxBarThickness: 32,
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        },
                        {
                            label: 'Sekarang',
                            backgroundColor: primaryColor,
                            borderColor: primaryColor,
                            borderRadius: 4,
                            maxBarThickness: 32,
                            data: {{ $this_year }},
                        },
                    ],
                },
                options: {
                    scales: {
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = Math.floor(((currentValue/total) * 100)+0.5);         
                                return percentage + "%";
                                }
                            }
                        },
                        x: {
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            },
                        },
                        y: {
                            ticks: {
                                min: 0,
                                max: 50000,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                color: 'rgba(0, 0, 0, .075)',
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            displayColors: true
                        }
                    },
                }
            });

        </script>
        <!--  Load chart demos for this page-->            
        {{-- <script src="{{ url('js/charts/demos/chart-pie-demo.js') }}"></script> --}}
        {{-- <script src="{{ url('js/charts/demos/dashboard-chart-bar-grouped-demo.js') }}"></script> --}}
        @endif
        <!-- Load Simple DataTables Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ url('js/datatables/datatables-simple-demo.js') }}"></script>
    </body>
</html>
