@extends('auth.layout')
@section('title', 'Ubah Berita')
@section('main')
<div class="mb-5 col-lg-9">
    <div class="card card-raised">
        <div class="card-body p-5">
            <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                    Berita akan terbit setelah diperiksa
                </div>
            </div>

            <div class="row">
                <div class="mb-4 col-12 col-sm-5">
                    <img src="{{ url($post->thumbnail->asset_url) }}" class="img-thumbnail">
                </div>
            </div>
            <div class="mb-4 col-12 col-sm-7">
                <label class="form-label mb-2 text-muted">Judul <span class="text-danger">*</span></label>
                <div>{!! $post->title !!}</div>
            </div>
            <div class="mb-4">
                <label class="form-label mb-2 text-muted">Kutipan awal <span class="text-danger">*</span></label>
                <div>{!! $post->excerpt !!}</div>
            </div>
            <div class="mb-4">
                <label class="form-label mb-2 text-muted">Konten</label>
                <div>{!! $post->content ?? '<span class="text-gray form-label">(Kosong)</span>' !!}</div>
            </div>
            <div class="mb-4" style="width: 140px">
                <label class="form-label text-muted" for="litepicker">Terbit <span class="text-danger">*</span></label>
                <div>{!! $post->published_at->format('Y-m-d') !!}</div>
            </div>
            <div class="mb-4 col-12 col-sm">
                <label class="form-label text-muted" for="formFileMultiple">Lampiran</label>
                @if ($attachments->count() > 0)
                <div class="chip-set">
                    @foreach ($attachments as $key => $attachment)
                    <a href="{!! url($attachment->file[0]->asset_url) !!}" target="_blank" class="col-12 mb-1">
                        <div class="chip active">
                            <i class="chip-leading-icon material-icons">attach_file</i>
                            Lampiran {{ ++$key }}
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-gray form-label">(Kosong)</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection