@extends('guest.layout')
@section('title', 'Pendaftaran Mutasi')
@section('main')
    <div class="pt-120 pb-130 bg-dark shape-parent overflow-hidden">
        <!-- Shape-->
        <div class="shape justify-content-start"><img loading="lazy" src="assets/img/root/home-1-shape-936x252.png"
                alt="" width="936" height="252"></div><!-- Shape-->
        <div class="shape justify-content-end align-items-end"><img loading="lazy"
                src="assets/img/root/home-1-shape-308x487.png" alt="" width="308" height="487"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2 class="mb-25 text-white text-center" data-show="startbox">Pendaftaran Mutasi Peserta Didik</h2>
                    <p class="m-0 text-white text-center" data-show="startbox" data-show-delay="100">
                        Selama seleksi tidak dipunggut biaya. Gratis!
                    </p>
                    <p class="m-0 text-white text-center" data-show="startbox" data-show-delay="100">
                        Lengkapi isian di bawah /
                        hubungi kontak jika ada pertanyaan.
                    </p>
                    <div class="bg-dark-light rounded-4 mt-50 px-70" data-show="startbox" data-show-delay="200">
                        <div class="d-flex align-items-center row">
                            <div class="col-lg-6">
                                <ul class="d-flex d-lg-inline-flex list-group flex-lg-row mb-10 borderless">
                                    <li class="list-group-item d-flex mt-30">
                                        <svg class="me-15 align-self-center text-accent-3"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                                            <path fill="currentColor"
                                                d="M16 11.98v2.408a1.604 1.604 0 0 1-1.094 1.527 1.613 1.613 0 0 1-.66.079 15.941 15.941 0 0 1-6.943-2.465A15.672 15.672 0 0 1 2.476 8.71a15.869 15.869 0 0 1-2.47-6.96A1.603 1.603 0 0 1 .96.136C1.163.047 1.384 0 1.607 0h2.414A1.61 1.61 0 0 1 5.63 1.381c.102.77.29 1.528.563 2.256a1.603 1.603 0 0 1-.362 1.694l-1.022 1.02a12.86 12.86 0 0 0 4.827 4.817l1.022-1.02a1.61 1.61 0 0 1 1.697-.36c.73.271 1.489.46 2.26.561A1.61 1.61 0 0 1 16 11.98Z" />
                                        </svg>
                                        <a class="fw-bold text-white" href="tel:08568800864">0856-8800-864</a>
                                    </li>
                                </ul>
                                <div class="fw-bold text-white font-size-16">Firman Afandi</div>
                                <div class="font-size-15 text-gray mt-5 mb-30">Panitia</div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="d-flex d-lg-inline-flex list-group flex-lg-row mb-10 borderless">
                                    <li class="list-group-item d-flex mt-30">
                                        <svg class="me-15 align-self-center text-accent-3"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                                            <path fill="currentColor"
                                                d="M16 11.98v2.408a1.604 1.604 0 0 1-1.094 1.527 1.613 1.613 0 0 1-.66.079 15.941 15.941 0 0 1-6.943-2.465A15.672 15.672 0 0 1 2.476 8.71a15.869 15.869 0 0 1-2.47-6.96A1.603 1.603 0 0 1 .96.136C1.163.047 1.384 0 1.607 0h2.414A1.61 1.61 0 0 1 5.63 1.381c.102.77.29 1.528.563 2.256a1.603 1.603 0 0 1-.362 1.694l-1.022 1.02a12.86 12.86 0 0 0 4.827 4.817l1.022-1.02a1.61 1.61 0 0 1 1.697-.36c.73.271 1.489.46 2.26.561A1.61 1.61 0 0 1 16 11.98Z" />
                                        </svg>
                                        <a class="fw-bold text-white" href="tel:087888883802">0878-8888-3802</a>
                                    </li>
                                </ul>
                                <div class="fw-bold text-white font-size-16">Triyadi</div>
                                <div class="font-size-15 text-gray mt-5 mb-30">Panitia</div>
                            </div>
                        </div>
                    </div><!-- Form-->
                    <form class="mt-75" data-show="startbox">
                        <div class="row gy-40">
                            <div class="col-12 col-md-6">
                                <input class="form-control form-control-gray" type="text"
                                    placeholder="Nama Peserta Didik *" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control form-control-gray" type="text"
                                    placeholder="Whatsapp Peserta Didik *" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control form-control-gray" type="text"
                                    placeholder="Nama Orangtua / Wali *" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control form-control-gray" type="text"
                                    placeholder="Whatsapp Orangtua / Wali *" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <select class="form-control text-white bg-dark">
                                    <option selected="">Pilih Rombel *</option>
                                    <option>X (tersedia 7)</option>
                                    <option>XII MIPA (tersedia 1)</option>
                                    <option>XII IPS (tersedia 1)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-attach-file text-white">
                                    <label class="form-attach-label" for="formFile">
                                        <div class="row">
                                            <div class="col-auto pe-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26"
                                                    fill="none">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.6"
                                                        d="M24 12.251 13.126 22.953A7.162 7.162 0 0 1 8.103 25a7.162 7.162 0 0 1-5.022-2.047A6.935 6.935 0 0 1 1 18.009c0-1.854.748-3.632 2.08-4.943L13.955 2.365A4.775 4.775 0 0 1 17.303 1c1.256 0 2.46.491 3.348 1.365a4.624 4.624 0 0 1 1.387 3.295 4.624 4.624 0 0 1-1.387 3.296L9.766 19.657a2.387 2.387 0 0 1-1.675.683c-.627 0-1.23-.246-1.674-.683a2.312 2.312 0 0 1-.693-1.648c0-.618.25-1.21.693-1.647l10.046-9.875" />
                                                </svg>
                                            </div>
                                            <div class="col ps-0">
                                                Lampiran PDF berisi scan Rapor, Ijazah, Akte, dan Kartu Keluarga
                                            </div>
                                        </div>
                                    </label>

                                    <input class="form-control" type="file" id="formFile" accept="application/pdf"
                                        hidden required>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="row">
                                    <div id="recaptcha" class="g-recaptcha"
                                        data-sitekey="6LejqcQjAAAAAGaLoJI0fcUqu69KNMzO0cXzA5Oh" required>
                                    </div>
                                </div>
                                @error('g-recaptcha-response')
                                    <div class="form-text text-danger">Lengkapi Captcha</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-accent-1">Daftar sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
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
