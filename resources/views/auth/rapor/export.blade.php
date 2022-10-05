@php
$no = 1;
@endphp
@if (Session::get('run_subject') == 10)
    <table>
        <thead>
            <tr>
                <th width="0" align="center">absen</th>
                <th width="6" align="center">no</th>
                <th width="33" align="center">nama</th>
                <th width="8" align="center">sakit</th>
                <th width="8" align="center">ijin</th>
                <th width="8" align="center">alpa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scores as $score)
                <tr>
                    <td align="left">{{ $score->learning_id }}</td>
                    <td align="left">{{ $no++ }}</td>
                    <td align="left">{{ $score->name }}</td>
                    <td align="center">{{ $score->sakit }}</td>
                    <td align="center">{{ $score->ijin }}</td>
                    <td align="center">{{ $score->alpa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    @if ($rombel_id > 5)
        <table>
            <thead>
                <tr>
                    <th width="0" align="center">{{ $curriculum }}</th>
                    <th width="6" align="center">no</th>
                    <th width="33" align="center">nama</th>
                    <th width="8" align="center">uh1<span>*</span></th>
                    <th width="8" align="center">rh1</th>
                    <th width="8" align="center">uh2</th>
                    <th width="8" align="center">rh2</th>
                    <th width="8" align="center">k1<span>*</span></th>
                    <th width="8" align="center">rk1</th>
                    <th width="8" align="center">pts<span>*</span></th>
                    <th width="8" align="center">sikap<span>*</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td align="left">{{ $score->learning_id }}</td>
                        <td align="left">{{ $no++ }}</td>
                        <td align="left">{{ $score->name }}</td>
                        <td align="center">{{ $score->uh1 }}</td>
                        <td align="center">{{ $score->rh1 }}</td>
                        <td align="center">{{ $score->uh2 }}</td>
                        <td align="center">{{ $score->rh2 }}</td>
                        <td align="center">{{ $score->k1 }}</td>
                        <td align="center">{{ $score->rk1 }}</td>
                        <td align="center">{{ $score->pts }}</td>
                        <td align="center">{{ $score->sikap }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <table>
            <thead>
                <tr>
                    <th width="0" align="center">{{ $curriculum }}</th>
                    <th width="6" align="center">no</th>
                    <th width="33" align="center">nama</th>
                    <th width="8" align="center">s1</th>
                    <th width="8" align="center">s2</th>
                    <th width="8" align="center">pts</th>
                    <th width="8" align="center">sikap</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td align="left">{{ $score->learning_id }}</td>
                        <td align="left">{{ $no++ }}</td>
                        <td align="left">{{ $score->name }}</td>
                        <td align="center">{{ $score->sum1 }}</td>
                        <td align="center">{{ $score->sum2 }}</td>
                        <td align="center">{{ $score->pts }}</td>
                        <td align="center">{{ $score->sikap }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endif
