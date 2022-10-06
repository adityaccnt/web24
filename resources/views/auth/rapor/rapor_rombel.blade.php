@extends('auth.layout')
@section('title', 'Nilai')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th colspan="2">Nama</th>
                        <th>Rapor</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($students as $student)
                        <tr>
                            <td class="text-start px-0">{{ $no++ }}.</td>
                            <td class="text-start px-0">{{ $student->name }}
                            <td>
                                <form method="POST" action="{{ url()->current() . '/' . $student->student_id }}">
                                    <a href="{{ url('kelola-rapor/' . $student->rombel_id . '/' . $student->student_id) }}"
                                        class="btn btn-sm btn-text-primary">Lihat</a>
                                    @csrf
                                    <button class="btn btn-sm btn-text-primary ms-3">Unduh</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
