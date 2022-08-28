<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Aditya Dwi Rahmadi" />
        <title>Masuk</title>
        <!-- Load Favicon-->
        <link href="{{ url('assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
        <!-- Load Material Icons from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
        <!-- Roboto and Roboto Mono fonts from Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
        <!-- Load main stylesheet-->
        <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-pattern-waihou">
        <!-- Layout wrapper-->
        <div id="layoutAuthentication">
            <!-- Layout content-->
            <div id="layoutAuthentication_content">
                <!-- Main page content-->
                <main>
                    <!-- Main content container-->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-10 col-xl-10 col-lg-12">
                                <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                    <div class="row g-0">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="card-body p-5">
                                                <!-- Auth header with logo image-->
                                                <div class="text-center">
                                                    <img class="mb-5" src="{{ url('public/files/logo.png') }}" alt="..." style="height: 48px" />
                                                </div>
                                                <!-- Login submission form-->
                                                @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                                    {{ $errors->first() }}
                                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
                                                <form class="mb-5" action="masuk" method="POST">
                                                    @csrf
                                                    <div class="mb-4"><mwc-textfield class="w-100" label="Email" name="email" outlined required></mwc-textfield></div>
                                                    <div class="mb-4"><mwc-textfield class="w-100" label="Kata Sandi" name="password" outlined required type="password"></mwc-textfield></div>
                                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <button type="submit" class="btn btn-primary">Masuk</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Background image column using inline CSS-->
                                        <div class="col-lg-7 col-md-6 d-none d-md-block" style="background-image: url('{{ url('public/files/kontak.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Layout footer-->
            <div id="layoutAuthentication_footer"></div>
        </div>
        <!-- Load Bootstrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Load global scripts-->
        <script type="module" src="js/material.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
