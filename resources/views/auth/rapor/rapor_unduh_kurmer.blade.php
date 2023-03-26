@extends('auth.layout_pdf')
@section('title', 'Rapor')
@section('main')
    <div style="padding: 0.65cm; padding-bottom: 0">
        <img style="width: 2.5cm" class="float-start"
            src="data:image/jpeg;base64,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">
        <div class="mb-2 text-center float-start" style="width:14.5cm">
            <div>
                PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA<br />
                DINAS PENDIDIKAN
            </div>
            <div class="font-weight-bold" style="font-size: 10pt">
                SEKOLAH MENENGAH ATAS NEGERI 24 JAKARTA
            </div>
            <div style="font-size: 8pt">
                <small class="text-center" style="line-height: 1">
                    Jalan Lapangan Tembak Nomor 1, Gelora, Tanah Abang, Telepon 5736984, Faksimile 5749047<br />
                    Website : www.sman24jakarta.sch.id E-mail : sman24jakarta@yahoo.com<br />
                </small>
                <small class="text-end small">Kode Pos : 10270</small>
            </div>
        </div>
        <img style="width: 2.5cm" class="float-start"
            src="data:image/jpeg;base64,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">

        <div style="border-bottom: 2px solid black; margin-top:2.75cm"></div>
        <div class="fw-bold my-2 text-center small">
            LAPORAN HASIL BELAJAR TENGAH SEMESTER<br />
            TAHUN PELAJARAN 2022 / 2023
        </div>

        <table class="table border-0">
            <tbody>
                <tr class="border-0">
                    <td style="padding: 0; border:none; width: 8%" class="small">Nama </td>
                    <td style="padding: 0; border:none; width: 72%" class="small font-weight-bold">:
                        {{ $student->name }}
                    </td>
                    <td style="padding: 0; border:none; width: 8%" class="small">Semester </td>
                    <td style="padding: 0; border:none; width: 12%" class="small font-weight-bold">: Genap </td>
                </tr>
                <tr class="border-0">
                    <td style="padding: 0; border:none;" class="small">NIS </td>
                    <td style="padding: 0; border:none;" class="small font-weight-bold">: {{ $student->id }}</td>
                    <td style="padding: 0; border:none;" class="small">Kelas </td>
                    <td style="padding: 0; border:none;" class="small font-weight-bold">: {{ $rombel }}
                    </td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="small py-3" colspan="2" valign="middle">Mata Pelajaran</th>
                    <th width="35" class="small" colspan="2" valign="middle">Sumatif 1</th>
                    <th width="35" class="small" colspan="2" valign="middle">Sumatif 2</th>
                    <th width="30" class="small" colspan="2" valign="middle">PTS</th>
                    <th width="35" class="small" colspan="2" valign="middle">Sikap</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $absen = [];
                    
                    $ipa[5] = [];
                    $ipa[6] = [];
                    $ipa[10] = [];
                    
                    $ips[5] = [];
                    $ips[6] = [];
                    $ips[10] = [];
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

                    @if ($subject->subject_id == 10)
                        @continue
                    @endif

                    @if ($subject->subject_id == 8 || $subject->subject_id == 12 || $subject->subject_id == 16)
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][5]))
                            @php
                                $ipa[5][] = $scores[$subject->subject_id][5] == 1 ? '0' : $scores[$subject->subject_id][5];
                            @endphp
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][6]))
                            @php
                                $ipa[6][] = +$scores[$subject->subject_id][6] == 1 ? '0' : $scores[$subject->subject_id][6];
                            @endphp
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][10]))
                            @php
                                $ipa[10][] = +$scores[$subject->subject_id][10] == 1 ? '0' : $scores[$subject->subject_id][10];
                            @endphp
                        @endif
                        @continue
                    @endif

                    @if ($subject->subject_id == 11 ||
                        $subject->subject_id == 13 ||
                        $subject->subject_id == 26 ||
                        $subject->subject_id == 25)
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][5]))
                            @php
                                $ips[5][] = $scores[$subject->subject_id][5] == 1 ? '0' : $scores[$subject->subject_id][5];
                            @endphp
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][6]))
                            @php
                                $ips[6][] = +$scores[$subject->subject_id][6] == 1 ? '0' : $scores[$subject->subject_id][6];
                            @endphp
                        @endif
                        @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][10]))
                            @php
                                $ips[10][] = $scores[$subject->subject_id][10] == 1 ? '0' : $scores[$subject->subject_id][10];
                            @endphp
                        @endif
                        @continue
                    @endif
                    <tr>
                        <td class="text-start p-2" width="10">{{ $no++ }}</td>
                        <td class="text-start p-2">{{ $subject->name }}</td>
                        <td colspan="2" class="text-center p-2">
                            @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][5]))
                                {{ $scores[$subject->subject_id][5] == 1 ? '0' : $scores[$subject->subject_id][5] }}
                            @endif
                        </td>
                        <td colspan="2" class="text-center p-2">
                            @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][6]))
                                {{ $scores[$subject->subject_id][6] == 1 ? '0' : $scores[$subject->subject_id][6] }}
                            @endif
                        </td>
                        <td colspan="2" class="text-center p-2">
                            @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][10]))
                                {{ $scores[$subject->subject_id][10] == 1 ? '0' : $scores[$subject->subject_id][10] }}
                            @endif
                        </td>
                        <td colspan="2" class="text-center p-2">
                            @if (isset($scores[$subject->subject_id]) && isset($scores[$subject->subject_id][9]))
                                {{ $scores[$subject->subject_id][9] == 1 ? '0' : $scores[$subject->subject_id][9] }}
                            @endif
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td class="text-start p-2">{{ $no++ }}</td>
                    <td class="text-start p-2">Ilmu Pengetahuan Alam</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ipa[5]) / count($ipa[5])) }}</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ipa[6]) / count($ipa[6])) }}</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ipa[10]) / count($ipa[10])) }}</td>
                    <td class="text-center p-2" colspan="2">B</td>
                </tr>
                <tr>
                    <td class="text-start p-2">{{ $no++ }}</td>
                    <td class="text-start p-2">Ilmu Pengetahuan Sosial</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ips[5]) / count($ips[5])) }}</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ips[6]) / count($ips[6])) }}</td>
                    <td class="text-center p-2" colspan="2">{{ round(array_sum($ips[10]) / count($ips[10])) }}</td>
                    <td class="text-center p-2" colspan="2">B</td>
                </tr>


                <tr style="border: none">
                    <td colspan="10" height="10" style="border: none"></td>
                </tr>

                <tr style="border: none">
                    <td style="border: none" colspan="2" class="p-0 pe-5">
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
                    <td style="border: none" colspan="3" class="p-0 pe-2">
                        <table class="table text-center" style="border:none">
                            <tbody>
                                <tr style="border:none">
                                    <td class="p-2 ps-0 pb-10 text-start"
                                        style="border:none; border-bottom:1px solid black">
                                        Mengetahui<br />
                                        Orang Tua/Wali</td>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <hr />
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="border: none" colspan="5" class="p-0 ps-2">
                        <table class="table table-bordered text-center">
                            <tbody>
                                <tr class="border-0 border-primary">
                                    <td class="p-2 pb-10 text-start border-0 border-bottom">Jakarta Pusat, 31 Maret
                                        2023<br />Wali Kelas
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        {{ $walas }}<br />
                                        {{ $nip }}

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
