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
                                    <td class="text-start px-0">{{ $score->name }}
                                    <td>{{ $score->sakit }}</td>
                                    <td>{{ $score->ijin }}</td>
                                    <td>{{ $score->alpa }}</td>
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
                                        <td class="text-start px-0">{{ $score->name }}</td>
                                        <td>{{ $score->uh1 }}</td>
                                        <td>{{ $score->rh1 }}</td>
                                        <td>{{ $score->uh2 }}</td>
                                        <td>{{ $score->rh2 }}</td>
                                        <td>{{ $score->k1 }}</td>
                                        <td>{{ $score->rk1 }}</td>
                                        <td>{{ $score->pts }}</td>
                                        <td>{{ $score->sikap }}</td>
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
                                        <td class="text-start px-0">{{ $score->name }}</td>
                                        <td>{{ $score->sum1 }}</td>
                                        <td>{{ $score->sum2 }}</td>
                                        <td>{{ $score->pts }}</td>
                                        <td>{{ $score->sikap }}</td>
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
