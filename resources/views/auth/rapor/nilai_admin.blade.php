@extends('auth.layout')
@section('title', 'Nilai')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">

            @if (!$scores)
            <div class="h5 text-center text-muted">Belum ada penugasan</div>
            @else
                @if (Session::get('run_subject') == 10)
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th colspan="2">Nama</th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($scores as $score)
                                <tr>
                                    <td class="text-start px-0">{{ $no++ }}.</td>
                                    <td class="text-start px-0">{{ $score->name }}<input type="hidden" name="learning_id[]"
                                            value="{{ $score->learning_id }}"></td>
                                    <td>
                                        <input type="number" name="sakit[]" class="form-control text-center px-0 m-auto"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->sakit) value="{{ $score->sakit }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td>
                                        <input type="number" name="ijin[]" class="form-control text-center px-0 m-auto"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->ijin) value="{{ $score->ijin }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                    <td>
                                        <input type="number" name="alpa[]" class="form-control text-center px-0 m-auto"
                                            maxlength="3" style="width: 6ch"
                                            @if ($score->alpa) value="{{ $score->alpa }}" @endif
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
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
                                                <option value="A" @if ($score->sikap && $score->sikap == 'A') selected @endif>
                                                    A
                                                </option>
                                                <option value="B" @if ($score->sikap && $score->sikap == 'B') selected @endif>
                                                    B
                                                </option>
                                                <option value="C" @if ($score->sikap && $score->sikap == 'C') selected @endif>
                                                    C
                                                </option>
                                                <option value="D" @if ($score->sikap && $score->sikap == 'D') selected @endif>
                                                    D
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
                                                <option value="A" @if ($score->sikap && $score->sikap == 'A') selected @endif>
                                                    A
                                                </option>
                                                <option value="B" @if ($score->sikap && $score->sikap == 'B') selected @endif>
                                                    B
                                                </option>
                                                <option value="C" @if ($score->sikap && $score->sikap == 'C') selected @endif>
                                                    C
                                                </option>
                                                <option value="D" @if ($score->sikap && $score->sikap == 'D') selected @endif>
                                                    D
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            @endif
        </div>
    </div>
    {{-- <script>
        $('.modal-footer .btn-primary').click(function() {
            $(this).attr('disabled', 'disabled').html(
                '<span class="spinner-border spinner-border-sm me-3"></span>Tunggu')
        })
    </script> --}}
@endsection
