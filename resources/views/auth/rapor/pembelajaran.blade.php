@extends('auth.layout')
@section('title', 'Status Penilaian')
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

            <div class="display-6">Status Penilaian</div>
            <p class="card-text">Menampilkan daftar hasil penilaian serta informasi mengenai hasil pembelajaran.</p>
            <div class="col-md-3">
                <select class="form-select" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    @foreach ($rombels as $rombel)                        
                    <option value="{{ url('status-penilaian/' . $rombel->id) }}" {{ Request::is('status-penilaian/' . $rombel->id) ? ' selected' : '' }}>{{ $rombel->name }}</option>
                    @endforeach
                </select>
            </div>
            <br/>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="d-none d-md-table-cell" colspan="2">Mata Pelajaran</th>
                        <th>Pendidik</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($learnings as $learning)
                        <tr class="">
                            <td class="d-none d-md-table-cell " style="width: 0px" class="px-1 py-2">{{ $no++ }}</td>
                            <td class="d-none d-md-table-cell p-0 py-3">{{ $learning->name }}</td>
                            <td>{{ $learning->guru }}</td>
                            <td class="{{ ($learning->maping > 0) ? 'bg-success':'bg-danger' }} text-white text-center" style="width: 1px">{{ ($learning->maping > 0) ? 'Y':'N' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection
