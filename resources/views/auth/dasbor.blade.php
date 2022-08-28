@extends('auth.layout')
@section('title','Dasbor')
@section('main')
<div class="row justify-content-between align-items-center mb-5">
    <div class="col flex-shrink-0 mb-5 mb-md-0">
        <h1 class="display-4 mb-0">Dasbor</h1>
        <div class="text-muted">Rekapitulasi aktivitas pada situs web</div>
    </div>
    <div class="col-12 col-md-auto">
        <div class="d-flex flex-column flex-sm-row gap-3">
            <mwc-select class="mw-50 mb-2 mb-md-0 ubah" outlined label="Sebagai">
                @foreach ($organizations as $organization)
                <mwc-list-item value="{{ url('sebagai/' . $organization->id) }}" @if(session('run_as')==$organization->organization->id ) selected @endif>{{ $organization->organization->name }}</mwc-list-item>
                @endforeach
            </mwc-select>
        </div>
    </div>
</div>
<!-- Colored status cards-->
<div class="row gx-5">
    <div class="col-xxl-3 col-md-6 mb-5">
        <div class="card card-raised border-start border-primary border-4">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="me-2">
                        <div class="display-5">{{ $berita }}</div>
                        <div class="card-text">Berita</div>
                    </div>
                    <div class="icon-circle bg-primary text-white"><i class="material-icons">newspaper</i></div>
                </div>
                <div class="card-text">
                    <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-xs text-{{ $berita_stat >0? 'success' : 'danger' }}">{{ $berita_stat >0? 'arrow_upward' : 'arrow_downward' }}</i>
                        <div class="caption text-{{ $berita_stat >0? 'success' : 'danger' }} fw-500 me-2">{{ abs($berita_stat) }}</div>
                        <div class="caption">dari bulan lalu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6 mb-5">
        <div class="card card-raised border-start border-warning border-4">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="me-2">
                        <div class="display-5">{{ $album }}</div>
                        <div class="card-text">Galeri</div>
                    </div>
                    <div class="icon-circle bg-warning text-white"><i class="material-icons">photo_library</i></div>
                </div>
                <div class="card-text">
                    <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-xs text-{{ $album_stat >0? 'success' : 'danger' }}">{{ $album_stat >0? 'arrow_upward' : 'arrow_downward' }}</i>
                        <div class="caption text-{{ $album_stat >0? 'success' : 'danger' }} fw-500 me-2">{{ abs($album_stat) }}</div>
                        <div class="caption">dari bulan lalu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6 mb-5">
        <div class="card card-raised border-start border-secondary border-4">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="me-2">
                        <div class="display-5">{{ $foto }}</div>
                        <div class="card-text">Foto</div>
                    </div>
                    <div class="icon-circle bg-secondary text-white"><i class="material-icons">image</i></div>
                </div>
                <div class="card-text">
                    <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-xs text-{{ $foto_stat >0? 'success' : 'danger' }}">{{ $foto_stat >0? 'arrow_upward' : 'arrow_downward' }}</i>
                        <div class="caption text-{{ $foto_stat >0? 'success' : 'danger' }} fw-500 me-2">{{ abs($foto_stat) }}</div>
                        <div class="caption">dari bulan lalu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6 mb-5">
        <div class="card card-raised border-start border-info border-4">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="me-2">
                        <div class="display-5">{{ $berkas }}</div>
                        <div class="card-text">Digunakan</div>
                    </div>
                    <div class="icon-circle bg-info text-white"><i class="material-icons">sd_card</i></div>
                </div>
                <div class="card-text">
                    <div class="d-inline-flex align-items-center">
                        <i class="material-icons icon-xs text-{{ $berkas_stat >0? 'success' : 'danger' }}">{{ $berkas_stat >0? 'arrow_upward' : 'arrow_downward' }}</i>
                        <div class="caption text-{{ $berkas_stat >0? 'success' : 'danger' }} fw-500 me-2">{{ $berkas_stat }}</div>
                        <div class="caption">dari bulan lalu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gx-5">
    <!-- Revenue breakdown chart example-->
    <div class="col-lg-8 mb-5">
        <div class="card card-raised h-100">
            <div class="card-header bg-transparent px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-4">
                        <h2 class="card-title mb-0">Berita</h2>
                        <div class="card-subtitle">Dibandingkan bulan</div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row gx-4">
                    @if ($posts_total > 0)
                    <div class="col-12 col-xxl-12"><canvas id="dashboardBarChart"></canvas></div>
                    @else
                    <div class="w-100 text-center text-gray">Belum ada berkas</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Segments pie chart example-->
    <div class="col-lg-4 mb-5">
        <div class="card card-raised h-100">
            <div class="card-header bg-transparent px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-4">
                        <h2 class="card-title mb-0">Berkas</h2>
                        <div class="card-subtitle">Persentase berdasarkan jenis berkas</div>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="d-flex h-100 w-100 align-items-center justify-content-center">
                    @if ($files_total > 0)
                    <div class="w-100" style="max-width: 20rem"><canvas id="myPieChart"></canvas></div>
                    @else
                    <div class="w-100 text-center text-gray">Belum ada berkas</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.ubah').on('change', function(){
           window.location = $(this).val();
        });
    })
</script>
@endsection