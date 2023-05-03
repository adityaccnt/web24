@extends('guest.layout')
@section('title', 'Pengumuman Kelulusan')
@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <!-- Page title-->
        <div class="position-relative py-210">
            <div class="background">
                <div class="background-image jarallax" data-jarallax data-speed="0.8"><img class="jarallax-img" loading="lazy" src="{{ url('public/background-graduation.png') }}" alt=""></div>
                <div class="background-color" style="--background-color: #000; opacity: .75;"></div>
            </div>
            <div class="container">
                <h1 class="text-white mb-0 text-center">Pengumuman Kelulusan 2023</h1>
            </div>
        </div><!-- Portfolio section-->

        <div class="pt-120 pb-130 bg-gray-light shape-parent">
            <!-- Shape-->
            <div class="shape align-items-start justify-content-start"><img loading="lazy" src="{{ url('assets/img/root/pricing-shape-623x455.png') }}" alt="" width="623" height="455"></div>
            <div class="container">
                <div class="row mb-90">
                    <div class="col-lg-6 mx-auto text-center" data-show="startbox">
                        <div class="mb-30 h4 fw-normal">
                            5 Mei 2023 pukul 07.00 WIB
                        </div>
                        <!-- Countdown-->
                        <div class="countdown" data-due-date="2023/05/05 07:00:00">
                            <div class="countdown-item"><span class="digits h1 large-heading  m-0" data-days="">00</span><span class="label display-6 ">Hari</span></div>
                            <div class="countdown-item d-none d-md-block">
                                <div class="sep h3  mt-15">:</div>
                            </div>
                            <div class="countdown-item"><span class="digits h1 large-heading  m-0" data-hours="">00</span><span class="label display-6 ">Jam</span></div>
                            <div class="countdown-item d-none d-md-block">
                                <div class="sep h3  mt-15">:</div>
                            </div>
                            <div class="countdown-item"><span class="digits h1 large-heading  m-0" data-minutes="">00</span><span class="label display-6 ">Menit</span></div>
                            <div class="countdown-item d-none d-md-block">
                                <div class="sep h3  mt-15">:</div>
                            </div>
                            <div class="countdown-item"><span class="digits h1 large-heading  m-0" data-seconds="">00</span><span class="label display-6 ">Detik</span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6 mx-auto" data-show="startbox">
                        <!-- Pricing-->
                        <form method="POST">
                            @csrf
                            
                            <div class="pricing position-relative rounded-4 bg-white shadow">
                                <div class="pricing-header text-center">
                                    <h3 class="pricing-title m-0">Cek Hasil Kelulusan</h3>
                                    <p class="pricing-subtitle text-gray-dark font-size-14 mt-10">Masukkan username dan password sesuai akun CBT Anda.</p>
                                </div>
                                @if ($errors->any())
                                    <div class="alert py-10 px-20 mb-20 alert-danger">
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    </div>
                                @endif
                                <div class="mt-35">
                                    <label class="mb-10 fw-bold">Username</label>
                                    <input type="text" name="username" class="form-control border rounded p-20" placeholder="Masukan username Anda" required>
                                </div>
                                <div class="mt-35">
                                    <label class="mb-10 fw-bold">Password</label>
                                    <input type="password" name="password" class="form-control border rounded p-20" placeholder="Masukan password Anda" required>
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-50">
                                    <div class="row">
                                        <div id="recaptcha" class="g-recaptcha"
                                            data-sitekey="6LejqcQjAAAAAGaLoJI0fcUqu69KNMzO0cXzA5Oh" required>
                                        </div>
                                    </div>
                                    @error('g-recaptcha-response')
                                        <div class="form-text text-danger">Lengkapi Captcha</div>
                                    @enderror
                                </div>
                                <div class="pricing-footer text-center mt-50">
                                    <button type="submit" class="btn btn-accent-1">Lihat Hasil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="m-0 fw-medium font-size-15 mt-60 text-center" data-show="startbox">Mengalami kendala saat melihat hasil kelulusan? <a href="https://wa.me/628568800864">Hubungi kami</a>.</p>
            </div>
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            window.onload = function() {
                var recaptcha = document.querySelector('#g-recaptcha-response');
                if (recaptcha) recaptcha.setAttribute("required", "required");
                recaptcha.oninvalid = function(e) {
                    alert("Silahkan lengkapi captcha");
                };
            };
        });
    </script>
@endsection
