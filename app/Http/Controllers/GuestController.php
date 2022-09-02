<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\Achievement;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\PostAttachment;
use App\Models\OrganizationMember;
use App\Models\OrganizationGallery;

class GuestController extends Controller
{
    public function beranda()
    {
        $post   = null;
        $posts  = null;
        $last   = Post::where('status_id', 1)->latest('published_at');
        if ($last->count() > 0) {
            $post   = $last->firstOrFail();
            $posts  = $last->where('id', '<>', $post->id)->limit(3)->get();
        }

        $albums = Album::latest('published_at')->where('status_id', 1)->limit(5)->get();

        return view('guest.beranda', [
            'post'     => $post,
            'posts'    => $posts,
            'albums'   => $albums,
            'tendik'   => User::where('role', 'K')->count(),
            'pendidik' => User::where('role', 'G')->count(),
        ]);
    }

    public function profil()
    {
        return view('guest.profil', [
            'ekskul'        => Organization::where('status', 'ekskul')->count(),
            'pendidik'      => User::where('role', 'G')->count(),
            'managements'   => OrganizationMember::where('position_id', '<', 11)->orWhere('position_id', '40')->orderByRaw('FIELD(position_id,1,40,2,3,4,5,6,7,8,9,10,0)')->get(),
        ]);
    }

    public function manajemen()
    {
        return view('guest.manajemen');
    }

    public function pendidik()
    {
        $teachers = User::where('role', 'G')->orderBy('name')->get();
        return view('guest.pendidik', [
            'teachers' => $teachers,
        ]);
    }

    public function tenaga_kependidikan()
    {
        $teachers = User::where('role', 'K')->orderBy('name')->get();
        return view('guest.tendik', [
            'teachers' => $teachers,
        ]);
    }

    public function osis()
    {
        $organization   = Organization::where('slug', 'osis')->firstOrFail();
        $member         = OrganizationMember::where('organization_id', $organization->id)->count();
        $result         = array();
        $schedules      = json_decode($organization->schedule, true);
        $days           = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $files          = OrganizationGallery::where('organization_id', $organization->id)->get();
        $organizations  = Organization::where('is_active', 1)->where('status', 'ekskul')->get();

        if ($organization->schedule <> null && count($schedules) > 0)
            foreach ($schedules as $key => $schedule) if ($schedule <> null) $result[] = $days[$key];

        return view('guest.osis', [
            'files'         => $files,
            'member'        => $member,
            'schedules'     => $result,
            'organization'  => $organization,
            'organizations' => $organizations,
        ]);
    }

    public function ekskul(Organization $organization)
    {
        if ($organization->is_active == 0 || $organization->status <> 'ekskul') abort(404);

        $member         = OrganizationMember::where('organization_id', $organization->id)->count();
        $result         = array();
        $schedules      = json_decode($organization->schedule, true);
        $days           = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $files          = OrganizationGallery::where('organization_id', $organization->id)->get();
        $organizations  = Organization::where('is_active', 1)->where('status', 'ekskul')->where('id', '<>', $organization->id)->get();

        if ($organization->schedule <> null && count($schedules) > 0)
            foreach ($schedules as $key => $schedule) if ($schedule <> null) $result[] = $days[$key];

        return view('guest.ekskul', [
            'files'         => $files,
            'member'        => $member,
            'schedules'     => $result,
            'organization'  => $organization,
            'organizations' => $organizations,
        ]);
    }

    public function fasilitas()
    {
        $facilities = Facility::orderBy('name')->get();
        return view('guest.fasilitas', [
            'facilities'    => $facilities,
        ]);
    }

    public function prestasi()
    {
        $achievements = Achievement::orderBy('name')->get();
        return view('guest.prestasi', [
            'achievements' => $achievements,
        ]);
    }

    public function berita()
    {
        return view('guest.berita', [
            'cover'      => Post::select('thumbnail_id')->latest()->first(),
            'posts'      => Post::with(['thumbnail', 'author', 'organization'])->where('status_id', 1)->latest()->get(),
            'categories' => Organization::where('status', 'manajemen')->get(),
        ]);
    }

    public function berita_show(Post $post)
    {
        if ($post->status_id <> 1) abort(404);
        $attachments    = PostAttachment::where('post_id', $post->id)->get();

        return view('guest.berita_show', [
            'posts'     => $post,
            'lposts'    => Post::with(['thumbnail', 'author', 'organization'])->latest('created_at')->where('id', '<>', $post->id)->where('status_id', 1)->limit(5)->get(),
            'attachments'   => $attachments,
        ]);
    }

    public function berita_category(Organization $organization)
    {
        return view('guest.berita_kategori', [
            'posts'      => $organization->post_active->load(['thumbnail', 'organization']),
            'categories' => Organization::where('status', 'manajemen')->get(),
            'category'   => $organization,
        ]);
    }

    public function berita_preview(Post $post)
    {
        if ($post->status_id == 3) abort(404);
        $attachments    = PostAttachment::where('post_id', $post->id)->get();

        return view('guest.berita_preview', [
            'posts'     => $post,
            'attachments'   => $attachments,
        ]);
    }

    public function galeri()
    {
        return view('guest.galeri', [
            'cover'      => Gallery::latest()->first(),
            'albums'     => Album::with(['thumbnail', 'organization'])->where('menu', 'galeri')->where('status_id', 1)->get(),
            'categories' => Organization::where('status', 'manajemen')->get(),
        ]);
    }

    public function galeri_category(Organization $organization)
    {
        return view('guest.galeri_kategori', [
            'albums'     => $organization->album_active->load('thumbnail'),
            'categories' => Organization::where('status', 'manajemen')->get(),
            'category'   => $organization,
        ]);
    }

    public function galeri_show(Album $album)
    {
        if ($album->is_active == 0 || $album->status_id <> 1) abort(404);

        return view('guest.galeri_show', [
            'album' => $album,
            'files' => Gallery::with(['file'])->where('album_id', $album->id)->get(),
        ]);
    }

    public function galeri_preview(Album $album)
    {
        if ($album->status_id == 3) abort(404);

        return view('guest.galeri_preview', [
            'album' => $album,
            'files' => Gallery::with(['file'])->where('album_id', $album->id)->get(),
        ]);
    }

    public function kontak()
    {
        return view('guest.kontak');
    }
}
