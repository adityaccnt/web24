<div class="drawer-menu-heading"></div>

<a class="nav-link{{ Request::is('dasbor') ? ' active' : '' }}" href="{{ url('/dasbor') }}">
    <div class="nav-link-icon"><i class="material-icons">bar_chart</i></div>
    Dasbor
</a>
@if (session('run_as') == 1)
    <div class="drawer-menu-divider mt-3"></div>
    <div class="drawer-menu-heading py-2"></div>
    <a class="nav-link{{ Request::is('kelola-rombel*') ? ' active' : '' }}" href="{{ url('/kelola-rombel') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Rombel
    </a>
    <a class="nav-link{{ Request::is('kelola-mapel*') ? ' active' : '' }}" href="{{ url('/kelola-mapel') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Mata Pelajaran
    </a>
    <a class="nav-link{{ Request::is('kelola-pembelajaran*') ? ' active' : '' }}"
        href="{{ url('/kelola-pembelajaran') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Pembelajaran
    </a>
    {{-- <div class="drawer-menu-divider mt-3"></div>
    <div class="drawer-menu-heading py-2"></div>
    <a class="nav-link{{ Request::is('kelola-legger*') ? ' active' : '' }}" href="{{ url('/kelola-legger') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Legger
    </a>
    <a class="nav-link{{ Request::is('kelola-rapor*') ? ' active' : '' }}" href="{{ url('/kelola-rapor') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Rapor
    </a> --}}
@endif
<div class="drawer-menu-divider mt-3"></div>
<div class="drawer-menu-heading py-2"></div>
<a class="nav-link {{ Request::is('kelola-nilai*') ? ' active' : 'collapsed' }}" href="javascript:void(0);"
    data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
    <div class="nav-link-icon"><i class="material-icons">school</i></div>
    @if (Session::get('run_subject') == 10)
    Absen
    @else
    Nilai
    @endif
    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
</a>
<div class="collapse {{ Request::is('kelola-nilai*') ? ' show' : '' }}" id="collapseLayouts"
    aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
    <nav class="drawer-menu-nested nav">
        @if (Session::get('run_as') == 1)
            @php
                $diampus = DB::table('rombels')
                    ->orderby('name')
                    ->get();
            @endphp
        @else
            @php
                $user = auth()->user()->id;
                $learning = DB::table('learnings')
                    ->select('student_id')
                    ->where('teacher_id', $user)
                    ->where('subject_id', Session::get('run_subject'))
                    ->pluck('student_id');
                $student_rombels = DB::table('student_rombels')
                    ->select('rombel_id')
                    ->distinct()
                    ->whereIn('student_id', $learning)
                    ->pluck('rombel_id');
                $diampus = DB::table('rombels')
                    ->whereIn('id', $student_rombels)
                    ->orderby('name')
                    ->get();
            @endphp
        @endif
        @foreach ($diampus as $diampu)
            <a class="nav-link {{ Request::is('kelola-nilai/' . $diampu->id) ? ' active' : '' }}"
                href="{{ url('kelola-nilai/' . $diampu->id) }}">{{ $diampu->name }}</a>
        @endforeach
    </nav>
</div>

{{-- <a class="nav-link{{ Request::is('kelola-kehadiran*') ? ' active' : '' }}" href="{{ url('/kelola-kehadiran') }}">
    <div class="nav-link-icon"><i class="material-icons">school</i></div>
    Kehadiran
</a> --}}
