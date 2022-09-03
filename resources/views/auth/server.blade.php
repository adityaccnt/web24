@extends('auth.layout')
@section('title', 'Server')
@section('main')
    <div class="card card-raised">
        <div class="card-body p-5">

            @if (session()->has('success'))                
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <div class="row">
                    <div class="material-icons me-2" style="width: 24px">check_circle</div>
                    <div class="col">{{ session('success') }}</div>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (session()->has('failed'))                
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <div class="row">
                    <div class="material-icons me-2" style="width: 24px">error</div>
                    <div class="col">{{ session('failed') }}</div>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="display-6">Server</div>
            <p class="card-text">Menampilkan semua daftar server serta informasi mengenai server tersebut.</p>

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>S</th>
                        <th>Nama</th>
                        <th class="d-none d-sm-table-cell">Alamat</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servers as $server)
                    <tr>
                        <td><span class="material-icons-round position-absolute text-{{ $server->status->color }}">{{ $server->status->sign }}</span></td>
                        <td>{{ $server->name }}</td>
                        <td class="d-none d-sm-table-cell">{{ $server->url }}</td>
                        <td>
                            <a href="{{ url("kelola-server/$server->name/refresh") }}"><span class="material-icons">refresh</span></a>
                            <a href="http://{{ $server->url }}" class="mx-2" target="_blank"><span class="material-icons">visibility</span></a>
                            @if ($server->status_id == 2)
                            <a href="{{ url("kelola-server/$server->name/switch/on") }}"><span class="material-icons text-gray">toggle_off</span></a>                                
                            @else
                            <a href="{{ url("kelola-server/$server->name/switch/off") }}"><span class="material-icons">toggle_on</span></a>                                
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
