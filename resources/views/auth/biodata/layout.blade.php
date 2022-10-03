<div class="drawer-menu-heading"></div>

<a class="nav-link{{ Request::is('dasbor') ? ' active' : '' }}" href="{{ url('/dasbor') }}">
    <div class="nav-link-icon"><i class="material-icons">bar_chart</i></div>
    Dasbor
</a>
<a class="nav-link{{ Request::is('kelola-berita*') ? ' active' : '' }}" href="{{ url('kelola-berita') }}">
    <div class="nav-link-icon"><i class="material-icons">newspaper</i></div>
    Berita
</a>
<a class="nav-link{{ Request::is('kelola-galeri*') ? ' active' : '' }}" href="{{ url('kelola-galeri') }}">
    <div class="nav-link-icon"><i class="material-icons">image</i></div>
    Galeri
</a>
@if (session('run_as') == 1)
    <div class="drawer-menu-divider mt-3"></div>
    <div class="drawer-menu-heading py-1"></div>
    <a class="nav-link{{ Request::is('kelola-pendidik*') ? ' active' : '' }}" href="{{ url('/kelola-pendidik') }}">
        <div class="nav-link-icon"><i class="material-icons">school</i></div>
        Pendidik
    </a>
    <a class="nav-link{{ Request::is('kelola-tendik*') ? ' active' : '' }}" href="{{ url('/kelola-tendik') }}">
        <div class="nav-link-icon"><i class="material-icons">group</i></div>
        Tenaga Kependidikan
    </a>
    <a class="nav-link{{ Request::is('kelola-manajemen*') ? ' active' : '' }}" href="{{ url('/kelola-manajemen') }}">
        <div class="nav-link-icon"><i class="material-icons">support_agent</i></div>
        Manajemen
    </a>
    <a class="nav-link{{ Request::is('kelola-osis*') ? ' active' : '' }}" href="{{ url('/kelola-osis') }}">
        <div class="nav-link-icon"><i class="material-icons">account_tree</i></div>
        OSIS
    </a>
    <a class="nav-link{{ Request::is('kelola-fasilitas*') ? ' active' : '' }}" href="{{ url('/kelola-fasilitas') }}">
        <div class="nav-link-icon"><i class="material-icons">airline_seat_recline_extra</i></div>
        Fasilitas
    </a>
    <a class="nav-link{{ Request::is('kelola-prestasi*') ? ' active' : '' }}" href="{{ url('/kelola-prestasi') }}">
        <div class="nav-link-icon"><i class="material-icons">military_tech</i></div>
        Prestasi
    </a>
    <a class="nav-link{{ Request::is('kelola-server*') ? ' active' : '' }}" href="{{ url('/kelola-server') }}">
        <div class="nav-link-icon"><i class="material-icons">dns</i></div>
        Server
    </a>
@endif
