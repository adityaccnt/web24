<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\PostAttachment;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $run_as = session('run_as');
        $post   = Post::select('slug', 'published_at', 'status_id', 'organization_id', 'author_id', 'title');
        if ($run_as == 1) $posts = $post->orderBy('status_id', 'asc')->orderBy('published_at', 'desc')->get();
        else $posts = $post->where('organization_id', $run_as)->orderBy('status_id', 'asc')->orderBy('published_at', 'desc')->get();

        return view('auth.berita', [
            'posts' => $posts->load(['organization', 'author', 'status']),
        ]);
    }

    public function create()
    {
        $run_as    = session('run_as');
        $organization = Organization::find($run_as);
        if ($organization->status <> 'manajemen') abort(404);
        return view('auth.berita_tambah');
    }

    public function store(Request $request)
    {
        try {

            $file = null;
            if ($request->file('thumbnail')) {
                $thumbnail      = $request->file('thumbnail');
                $thumbnail_ext  = $thumbnail->extension();
                $thumbnail_size = $thumbnail->getSize();
                $thumbnail_path = $thumbnail->store('public/attachments');

                $file = File::create([
                    'owner_id'  => auth()->user()->id,
                    'asset_url' => $thumbnail_path,
                    'extension' => $thumbnail_ext,
                    'size'      => $thumbnail_size,
                    'is_active' => 1,
                ]);
                $file->save();
                $file = $file->id;
            }

            $post = Post::create([
                'thumbnail_id'      => $file,
                'author_id'         => auth()->user()->id,
                'organization_id'   => session('run_as'),
                'title'             => $request->title,
                'content'           => $request->content,
                'excerpt'           => $request->excerpt,
                'slug'              => $request->slug,
                'status_id'         => 0,
                'published_at'      => $request->published_at . ' 00:00:00',
            ]);
            $post->save();

            if ($request->file('attachments')) {
                foreach ($request->file('attachments') as $attachment) {
                    $attachment_ext  = $attachment->extension();
                    $attachment_size = $attachment->getSize();
                    $attachment_path = $attachment->store('public/thumbnails');

                    $file = File::create([
                        'owner_id'  => auth()->user()->id,
                        'asset_url' => $attachment_path,
                        'extension' => $attachment_ext,
                        'size'      => $attachment_size,
                        'is_active' => 1,
                    ]);
                    $file->save();

                    PostAttachment::create([
                        'post_id'   => $post->id,
                        'file_id'   => $file->id,
                    ]);
                }
            }

            return redirect('kelola-berita')->with('success', 'Berita baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('kelola-berita')->with('failed', 'Ada kesalahan, berita gagal ditambahkan');
        }
    }

    public function show($post)
    {
        $post           = Post::where('slug', $post)->firstOrFail();
        $attachments    = PostAttachment::where('post_id', $post->id)->get();

        if (session('run_as') == 1)
            return view('auth.berita_admin', [
                'post'          => $post,
                'attachments'   => $attachments
            ]);

        return view('auth.berita_ubah', [
            'post'          => $post,
            'attachments'   => $attachments
        ]);
    }

    public function edit($post)
    {
        //
    }

    public function update(Request $request, $post)
    {
        $post = Post::where('slug', $post)->firstOrFail();

        $file = null;
        if ($request->file('thumbnail')) {
            $thumbnail      = $request->file('thumbnail');
            $thumbnail_ext  = $thumbnail->extension();
            $thumbnail_size = $thumbnail->getSize();
            $thumbnail_path = $thumbnail->store('public/attachments');

            $file = File::create([
                'owner_id'  => auth()->user()->id,
                'asset_url' => $thumbnail_path,
                'extension' => $thumbnail_ext,
                'size'      => $thumbnail_size,
                'is_active' => 1,
            ]);
            $file->save();
            $file = $file->id;

            Post::where('id', $post->id)->update([
                'thumbnail_id'      => $file,
            ]);
        }

        if ($request->file('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $attachment_ext  = $attachment->extension();
                $attachment_size = $attachment->getSize();
                $attachment_path = $attachment->store('public/thumbnails');

                $file = File::create([
                    'owner_id'  => auth()->user()->id,
                    'asset_url' => $attachment_path,
                    'extension' => $attachment_ext,
                    'size'      => $attachment_size,
                    'is_active' => 1,
                ]);
                $file->save();

                PostAttachment::create([
                    'post_id'   => $post->id,
                    'file_id'   => $file->id,
                ]);
            }
        }

        Post::where('id', $post->id)->update([
            'title'             => $request->title,
            'content'           => $request->content,
            'excerpt'           => $request->excerpt,
            'slug'              => $request->slug,
            'published_at'      => $request->published_at . ' 00:00:00',
        ]);

        if (session('run_as') == 1 && $request->status) {
            $status = $request->status;
            Post::where('id', $post->id)->update([
                'status_id'         => $status,
            ]);
        }

        return redirect('kelola-berita')->with('success', 'Berita baru berhasil diperbarui');
    }

    public function destroy(Post $post)
    {
        //
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
