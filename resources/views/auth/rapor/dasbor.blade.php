@extends('auth.layout')
@section('title', 'Dasbor')
@section('main')
    <div class="row justify-content-between align-items-center mb-5">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Dasbor</h1>
            {{-- <div class="text-muted">Hai, selamat datang! halaman ini masih dalam pengerjaan dan akan segera tersedia.</div> --}}
            {{-- <div class="text-muted">Rekapitulasi aktivitas pada situs web</div> --}}
        </div>
        <div class="col-12 col-md-auto">
            <div class="d-flex flex-column flex-sm-row gap-3">
                <mwc-select class="mw-50 mb-2 mb-md-0 ubah" outlined label="Mata Pelajaran">
                    @foreach ($learnings as $learning)
                        <mwc-list-item value="{{ url('g/' . $learning->subject_id) }}"
                            @if (session('run_subject') == $learning->subject_id) selected @endif>{{ $learning->mapel->name }}</mwc-list-item>
                    @endforeach
                </mwc-select>
            </div>
        </div>
    </div>
    <div class="row text-center justify-content-center py-10">
        <div class="h1 text-muted">{{ auth()->user()->name }}</div>
        <hr class="my-3" style="width: 50px; border: 2px solid black" />
        <p class="text-muted">{{ DB::table('subjects')->find(Session::get('run_subject'))->name }}
        </p>
    </div>

    <script>
        $(document).ready(function() {
            $('.ubah').on('change', function() {
                window.location = $(this).val();
            });
        })
    </script>
@endsection
