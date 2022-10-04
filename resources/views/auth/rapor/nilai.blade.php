@extends('auth.layout')
@section('title', 'Nilai')
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

            <div class="display-6">Nilai</div>
            <p>Setiap melakukan perubahan nilai, tekan tombol <b>Simpan</b> pada bagian bawah untuk menyimpan perubahan.
                Jika
                tidak, perubahan yang dibuat tidak akan tersimpan. Rentang nilai adalah 1-100 dan sikap adalah A/B/C/D.
                Nilai tidak diizinkan dalam bentuk pecahan. Tanda bintang menandakan wajib diisi.</p>
            {{-- <p class="card-text">Mengisi dan menampilkan daftar nilai, gunakan tombol di bawah ini untuk mengisi dalam bentuk
                excel yang telah disediakan.</p> --}}
            {{-- <button class="btn btn-success text-white px-3" type="button" data-bs-toggle="modal"
                data-bs-target="#modalTambah">
                Format Excel
            </button> --}}
            <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Format Excel</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Unduh nilai</label>
                                    <div>
                                        <a class="btn btn-success"
                                            href="{{ url('/kelola-nilai/excel/' . auth()->user()->id) }}">
                                            Unduh Format
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Unggah nilai</label>
                                    <input class="form-control" type="file"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required
                                        autocomplete="off">
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
            </div>

            <hr class="my-5" />
            <form method="POST" action="{{ url()->current() }}">
                @csrf
                @if ($rombel > 5)
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" colspan="2">Nama</th>
                                <th colspan="4">Pengetahuan</th>
                                <th colspan="2">Keterampilan</th>
                                <th rowspan="2">PTS<span class="text-danger">*</span></th>
                                <th rowspan="2">Sikap<span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <th>UH1<span class="text-danger">*</span></th>
                                <th>RH1</th>
                                <th>UH2</th>
                                <th>RH2</th>
                                <th>K1<span class="text-danger">*</span></th>
                                <th>RK1</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $s_key = 0;
                            @endphp

                            @foreach ($scores as $score)
                                <tr>
                                    <td class="text-start px-0">{{ $no++ }}.</td>
                                    <td class="text-start px-0">{{ $score->name }}<input type="hidden"
                                            name="learning_id[]" value="{{ $score->learning_id }}"></td>
                                    <td><input type="number" name="uh1[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->uh1) value="{{ $score->uh1 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required></td>
                                    <td><input type="number" name="rh1[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->rh1) value="{{ $score->rh1 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td><input type="number" name="uh2[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->uh2) value="{{ $score->uh2 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td><input type="number" name="rh2[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->rh2) value="{{ $score->rh2 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td><input type="number" name="k1[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->k1) value="{{ $score->k1 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required></td>
                                    <td><input type="number" name="rk1[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->rk1) value="{{ $score->rk1 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td><input type="number" name="pts[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->pts) value="{{ $score->pts }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </td>
                                    <td>
                                        <select class="form-select px-2" name="sikap[]" style="width: 8ch" required>
                                            <option value=""></option>
                                            <option value="A" @if ($score->sikap && $score->sikap == 'A') selected @endif>A
                                            </option>
                                            <option value="B" @if ($score->sikap && $score->sikap == 'B') selected @endif>B
                                            </option>
                                            <option value="C" @if ($score->sikap && $score->sikap == 'C') selected @endif>C
                                            </option>
                                            <option value="D" @if ($score->sikap && $score->sikap == 'D') selected @endif>D
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" colspan="2">Nama</th>
                                <th>Sumatif 1<span class="text-danger">*</span></th>
                                <th>Sumatif 2<span class="text-danger">*</span></th>
                                <th>PTS<span class="text-danger">*</span></th>
                                <th>Sikap<span class="text-danger">*</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $s_key = 0;
                            @endphp

                            @foreach ($scores as $score)
                                <tr>
                                    <td class="text-start px-0">{{ $no++ }}.</td>
                                    <td class="text-start px-0">{{ $score->name }}<input type="hidden"
                                            name="learning_id[]" value="{{ $score->learning_id }}"></td>
                                    <td><input type="number" name="sum1[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->sum1) value="{{ $score->sum1 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required></td>
                                    <td><input type="number" name="sum2[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->sum2) value="{{ $score->sum2 }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </td>
                                    <td><input type="number" name="pts[]" class="form-control text-center px-0"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->pts) value="{{ $score->pts }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required>
                                    </td>
                                    <td>
                                        <select class="form-select px-2" name="sikap[]" style="width: 8ch" required>
                                            <option value=""></option>
                                            <option value="A" @if ($score->sikap && $score->sikap == 'A') selected @endif>A
                                            </option>
                                            <option value="B" @if ($score->sikap && $score->sikap == 'B') selected @endif>B
                                            </option>
                                            <option value="C" @if ($score->sikap && $score->sikap == 'C') selected @endif>C
                                            </option>
                                            <option value="D" @if ($score->sikap && $score->sikap == 'D') selected @endif>D
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="float-end">
                    <button class="btn btn-primary" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('.modal-footer .btn-primary').click(function() {
            $(this).attr('disabled', 'disabled').html(
                '<span class="spinner-border spinner-border-sm me-3"></span>Tunggu')
        })
    </script>
@endsection
