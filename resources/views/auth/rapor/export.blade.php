<table>
    <thead>
        <tr>
            <th rowspan="2" width="6" align="center">No</th>
            <th rowspan="2" width="33" align="center">Nama</th>
            <th colspan="4" align="center">Pengetahuan</th>
            <th colspan="2" align="center">Keterampilan</th>
            <th rowspan="2" width="8" align="center">PTS<span>*</span></th>
            <th rowspan="2" width="8" align="center">Sikap<span>*</span></th>
        </tr>
        <tr>
            <th width="8" align="center">UH1<span>*</span></th>
            <th width="8" align="center">R</th>
            <th width="8" align="center">UH2</th>
            <th width="8" align="center">R</th>
            <th width="8" align="center">K1<span>*</span></th>
            <th width="8" align="center">R</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($scores as $score)
            <tr>
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
