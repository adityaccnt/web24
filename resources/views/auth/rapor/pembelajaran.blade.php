@extends('auth.layout')
@section('title', 'Pembelajaran')
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

            <div class="display-6">Pembelajaran</div>
            <p class="card-text">Menampilkan semua daftar pembelajaran serta informasi mengenai pembelajaran tersebut.</p>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah
            </button>
            <form method="POST" action="{{ url('kelola-pembelajaran') }}">
                @csrf
                <div class="modal fade" id="modalTambah" tabindex="-1">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label mb-1">Mata pelajaran</label>
                                    <select name="subject_id" class="form-select form-select" required autocomplete="off">
                                        <option value="" selected>Pilih mata pelajaran</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1">Pendidik</label>
                                    <select name="teacher_id" class="form-select form-select" required autocomplete="off">
                                        <option value="" selected>Pilih pendidik</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <label class="form-label mb-1">Peserta didik</label>
                                        <select class="form-select form-select" id="myInput" required autocomplete="off">
                                            <option value="" selected>Pilih rombel</option>
                                            @foreach ($rombels as $rombel)
                                                <option data-id="{{ $rombel->id }}" value="{{ $rombel->name }}">
                                                    {{ $rombel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table class="table table-bordered table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th style="padding: 0.5em">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="selectAll"
                                                            onchange="checkAll('check_1')" type="checkbox">
                                                        <label class="form-check-label" for="selectAll">Pilih semua</label>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @php $no=1 @endphp
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td style="padding: 0.5em">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input check_{{ $user->rombel->rombel_id }}"
                                                                name="student_id[]" type="checkbox"
                                                                value="{{ $user->id }}"
                                                                id="check_{{ $user->id }}">
                                                            <label class="form-check-label"
                                                                for="check_{{ $user->id }}">{{ $user->name }}</label>
                                                        </div>
                                                    </td>
                                                    <td class="d-none" style="padding: 0.5em">
                                                        {{ $user->rombel_name->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal"
                                    autofocus="disabled">Tutup</button>
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <hr class="my-5" />
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Pendidik</th>
                        <th>Peserta Didik</th>
                        <th>A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learnings as $learning)
                        <tr>
                            <td>{{ $learning->mapel->name }}</td>
                            <td>{{ $learning->guru->name }}</td>
                            <td>{{ $learning->count_pd }} Orang</td>
                            <td>
                                {{-- <a href="#" class="me-2"><span class="material-icons">edit</span></a> --}}
                                <form method="post" action="{{ url('kelola-pembelajaran/' . $learning->teacher_id) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="subject_id" value="{{ $learning->subject_id }}">
                                    <button class="btn btn-text-primary p-0"><span
                                            class="material-icons">delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-5"></div>
        </div>
    </div>
    <script>
        // $('.modal-footer .btn-primary').click(function() {
        //     $(this).html('<span class="spinner-border spinner-border-sm me-3"></span>Tunggu')
        // })

        function checkAll(class_name) {
            $("." + class_name).each(function() {
                if (this.checked == true)
                    this.checked = false;
                else
                    this.checked = true;
            });
        }

        $(document).ready(function() {
            $("#table1").hide();

            $("#myInput").on("change", function() {
                $("#table1").show();
                $('#selectAll').prop('checked', false).attr('onchange', "checkAll('check_" + $(this).find(
                    ':selected').attr('data-id') + "')");
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                if (value == '') $("#table1").hide();
            });

        });
    </script>
@endsection
