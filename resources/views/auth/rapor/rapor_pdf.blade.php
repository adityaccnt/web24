@extends('auth.layout')
@section('title', 'Rapor')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th rowspan="2" colspan="2">Mata Pelajaran</th>
                        <th colspan="4">Pengetahuan</th>
                        <th colspan="2">Keterampilan</th>
                        <th rowspan="2">PTS</th>
                        <th rowspan="2">Sikap</th>
                    </tr>
                    <tr>
                        <th>UH 1</th>
                        <th>RH 1</th>
                        <th>UH 2</th>
                        <th>RH 2</th>
                        <th>K 1</th>
                        <th>RK 1</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $absen = [];
                        $kelompok = [
                            0 => 'Kelompok A (Umum)',
                            6 => 'Kelompok B (Umum)',
                            9 => 'Kelompok D (Peminatan)',
                            14 => 'Kelompok D (Lintas Minat)',
                        ];
                    @endphp
                    @foreach ($subjects as $key => $subject)
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][11]))
                            @php
                                $absen['sakit'] = $scores[$subject->subject_id][11];
                            @endphp
                            @continue
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][12]))
                            @php
                                $absen['ijin'] = $scores[$subject->subject_id][12];
                            @endphp
                            @continue
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][13]))
                            @php
                                $absen['alpa'] = $scores[$subject->subject_id][13];
                            @endphp
                            @continue
                        @endif
                        
                        @if (isset($kelompok[$key]))
                        <tr>
                            <td colspan="10" class="text-start p-2">{{ $kelompok[$key] }}</td>
                        </tr>
                        @php
                                $no = 1;
                                @endphp
                        @endif

                        @if ($subject->subject_id == 10)
                            @continue
                        @endif
                        <tr>
                            <td class="text-start p-2">{{ $no++ }}</td>
                            <td class="text-start p-2">{{ $subject->name }}</td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][1]))
                                    {{ $scores[$subject->subject_id][1] == 1 ? '0' : $scores[$subject->subject_id][1] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][2]))
                                    {{ $scores[$subject->subject_id][2] == 1 ? '0' : $scores[$subject->subject_id][2] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][3]))
                                    {{ $scores[$subject->subject_id][3] == 1 ? '0' : $scores[$subject->subject_id][3] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][4]))
                                    {{ $scores[$subject->subject_id][4] == 1 ? '0' : $scores[$subject->subject_id][4] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][7]))
                                    {{ $scores[$subject->subject_id][7] == 1 ? '0' : $scores[$subject->subject_id][7] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][8]))
                                    {{ $scores[$subject->subject_id][8] == 1 ? '0' : $scores[$subject->subject_id][8] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][10]))
                                    {{ $scores[$subject->subject_id][10] == 1 ? '0' : $scores[$subject->subject_id][10] }}
                                @endif
                            </td>
                            <td class="text-center p-2">
                                @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][9]))
                                    {{ $scores[$subject->subject_id][9] == 1 ? '0' : $scores[$subject->subject_id][9] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    <tr style="border: none">
                        <td colspan="10" height="10" style="border: none"></td>
                    </tr>

                    <tr style="border: none">
                        <td style="border: none" colspan="2" class="p-0 pe-4">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="p-2">Ketidakhadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-2">Sakit</td>
                                        <td class="p-2">{{ $absen['sakit'] ?? 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">Ijin</td>
                                        <td class="p-2">{{ $absen['ijin'] ?? 0 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">Alpa</td>
                                        <td class="p-2">{{ $absen['alpa'] ?? 0 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none" colspan="3" class="p-0 px-4">
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <tr class="border-0 border-primary">
                                        <td class="p-2 pb-10 text-start border-0 border-bottom">Mengetahui<br />Orang
                                            Tua/Wali</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="border: none"></td>
                        <td style="border: none" colspan="4" class="p-0 px-4">
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <tr class="border-0 border-primary">
                                        <td class="p-2 pb-10 text-start border-0 border-bottom">Jakarta Pusat, 7 Oktober
                                            2022<br />Wali Kelas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
