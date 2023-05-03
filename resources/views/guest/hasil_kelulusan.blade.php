@extends('guest.layout')
@section('title', 'Pengumuman Kelulusan')
@section('main')
    <!-- Main-->
    <div class="content-wrap ">
        <div class="pt-120 pb-130 bg-gray-light shape-parent">
            <!-- Shape-->
            <div class="background-image jarallax" data-jarallax data-speed="0.8"><img class="jarallax-img" loading="lazy" src="{{ url('public/background-graduation.png') }}" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6 mt-100 mx-auto" data-show="startbox">
                        <!-- Pricing-->
                        <form method="POST">
                            @csrf
                            <div class="pricing position-relative rounded-4 bg-white shadow">
                                <div class="pricing-header">
                                    <h3 class="pricing-title m-0 text-center">Pengumuman Kelulusan</h3>
                                    <p class="pricing-subtitle text-gray-dark font-size-16 mt-30">Dengan ini menerangkan bahwa :</p>
                                </div>
                                <table class="table mb-20">
                                    <tr>
                                        <td class="fw-bold border-0 ps-0">NIS</td>
                                        <td class="border-0">{{ $data->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold border-0 ps-0">NISN</td>
                                        <td class="border-0">{{ $data->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold border-0 ps-0">Nama</td>
                                        <td class="border-0">{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold border-0 ps-0">Rombel</td>
                                        <td class="border-0">{{ $data->rombel }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold border-0 ps-0">TP</td>
                                        <td class="border-0">2022/2023</td>
                                    </tr>
                                </table>
                                <p class="mt-0">
                                    Dinyatakan <b><u>LULUS</u></b> dari SMA Negeri 24 Jakarta.
                                </p>
                                <p class="mt-0 font-size-16">
                                    Surat Keterangan Lulus dapat diambil <b>Senin, 8 Mei 2023</b> di Sekolah.
                                </p>
                                <div class="pricing-footer text-center mt-50">
                                    <a class="btn btn-accent-1" href="{{ url('kelulusan') }}" target="_self">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
