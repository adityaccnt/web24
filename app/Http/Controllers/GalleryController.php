<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $run_as = session('run_as');
        if ($run_as == 1)
            $posts = Album::orderBy('status_id', 'asc')->orderBy('published_at', 'desc')->get();
        else
            $posts = Album::where('organization_id', $run_as)->orderBy('status_id', 'asc')->orderBy('published_at', 'desc')->get();

        return view('auth.galeri', [
            'albums' => $posts->load(['organization', 'owner', 'status']),
        ]);
    }

    public function create()
    {
        return view('auth.galeri_tambah');
    }

    public function store(Request $request)
    {
        try {
            $post = Album::create([
                'owner_id'          => auth()->user()->id,
                'organization_id'   => session('run_as'),
                'thumbnail_id'      => null,
                'slug'              => $request->slug,
                'title'             => $request->title,
                'description'       => $request->description,
                'location'          => $request->location,
                'status_id'         => 0,
                'menu'              => 'galeri',
                'published_at'      => $request->published_at . ' 00:00:00',
                'is_active'         => 0,
            ]);
            $post->save();

            if ($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photo_ext  = $photo->extension();
                    $photo_size = $photo->getSize();
                    $photo_path = $photo->store('public/galleries');

                    $file = File::create([
                        'owner_id'  => auth()->user()->id,
                        'asset_url' => $photo_path,
                        'extension' => $photo_ext,
                        'size'      => $photo_size,
                        'is_active' => 1,
                    ]);
                    $file->save();

                    Gallery::create([
                        'album_id'  => $post->id,
                        'file_id'   => $file->id,
                    ]);
                }

                Album::where('id', $post->id)->update(['thumbnail_id' => $file->id]);
            } else {
                return redirect('kelola-galeri')->with('failed', 'Tidak ada foto yang dipilih');
            }

            return redirect('kelola-galeri')->with('success', 'Galeri baru berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('kelola-galeri')->with('failed', $e->getMessage());
        }
    }

    public function show($album)
    {
        $album      = Album::where('slug', $album)->firstOrFail();
        $gallery    = Gallery::with(['file'])->where('album_id', $album->id)->get();
        // 'files' => Gallery::with(['file'])->where('album_id', $album->id)->get(),

        if (session('run_as') == 1)
            return view('auth.galeri_admin', [
                'album'         => $album,
                'galleries'     => $gallery,
            ]);

        return view('auth.galeri_ubah', [
            'album'         => $album,
            'galleries'     => $gallery,
        ]);
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(Request $request, $gallery)
    {
        $album = Album::where('slug', $gallery)->firstOrFail();
        if ($request->thumbnail) {
            Album::where('id', $album->id)->update(['thumbnail_id' => $request->id]);
            return redirect('kelola-galeri/' . $gallery)->with('success', 'Foto utama berhasil diganti');
        }

        $post = Album::where('slug', $gallery)->update([
            'slug'              => $request->slug,
            'title'             => $request->title,
            'description'       => $request->description,
            'location'          => $request->location,
            'status_id'         => $request->status,
            'published_at'      => $request->published_at . ' 00:00:00',
            'is_active'         => 1,
        ]);

        if ($request->file('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photo_ext  = $photo->extension();
                $photo_size = $photo->getSize();
                $photo_path = $photo->store('public/galleries');

                $file = File::create([
                    'owner_id'  => auth()->user()->id,
                    'asset_url' => $photo_path,
                    'extension' => $photo_ext,
                    'size'      => $photo_size,
                    'is_active' => 1,
                ]);
                $file->save();

                Gallery::create([
                    'album_id'  => $album->id,
                    'file_id'   => $file->id,
                ]);
            }
        }

        return redirect('kelola-galeri/' . $gallery)->with('success', 'Galeri baru berhasil diperbarui');
    }

    public function destroy($gallery, Request $request)
    {
        Album::where('slug', $gallery)->firstOrFail();

        Gallery::where('file_id', $request->id)->delete();        

        $files  = File::where('id', $request->id);
        $file   = $files->firstOrFail();
        Storage::delete($file->asset_url);
        $file->delete();
        
        return redirect('kelola-galeri/' . $gallery)->with('success', 'Foto berhasil dihapus');
    }
}
