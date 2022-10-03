@extends('auth.layout')
@section('title', 'Mata Pelajaran')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <div class="row">
                        <div class="material-icons me-2" style="width: 24px">check_circle</div>
                        <div class="col">{{ session('success') }}</div>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="row">
                        <div class="material-icons me-2" style="width: 24px">error</div>
                        <div class="col">{{ session('failed') }}</div>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="display-6">Mata Pelajaran</div>
            <p class="card-text">Menampilkan semua daftar Mata Pelajaran serta informasi mengenai Mata Pelajaran tersebut.
            </p>
            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah
            </button> --}}
            {{-- <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Mata pelajaran</label>
                                    <input class="form-control" type="text" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Pendidik</label>
                                    <select class="form-select form-select" required autocomplete="off">
                                        <option value="" selected>Pilih pendidik</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <label class="form-label mb-1">Peserta didik: 0 Orang</label>
                                        <select class="form-select form-select" id="myInput" required autocomplete="off">
                                            <option value="" selected>Pilih rombel</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <table class="table table-bordered table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th style="padding: 0.5em">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        Pilih semua
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal"
                                autofocus="disabled">Tutup</button>
                            <button class="btn btn-primary" type="button">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Urutan</th>
                        {{-- <th>A</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->maping ? $subject->maping : '--' }}</td>
                            {{-- <td>
                                <a href="#" class="me-2"><span class="material-icons">edit</span></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><span
                                        class="material-icons">delete</span></a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
    <script>
        $('.modal-footer .btn-primary').click(function() {
            $(this).attr('disabled', 'disabled').html('<span class="spinner-border spinner-border-sm me-3"></span>Tunggu')
        })

        $(document).ready(function() {
            $("#table1").hide();

            $("#myInput").on("change", function() {
                $("#table1").show();
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                if (value == '') $("#table1").hide();
            });
        });
    </script>
@endsection
