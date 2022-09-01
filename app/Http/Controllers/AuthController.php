<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\PostAttachment;
use App\Models\OrganizationMember;
use App\Models\OrganizationGallery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function masuk()
    {
        return view('masuk');
    }

    public function dasbor()
    {
        $org_id         = session('run_as');
        $organizations  = OrganizationMember::select('organization_id', 'member_id')->where('member_id', auth()->user()->id)->get();
        $berita         = Post::where('organization_id', $org_id);
        $berita_thismth = Post::where('organization_id', $org_id)->whereMonth('created_at', date('m'))->get();
        $berita_lastmth = Post::where('organization_id', $org_id)->whereMonth('created_at', date('m', strtotime("-1 month")))->get();

        $albums          = Album::where('organization_id', $org_id)->get();
        $albums_thismth  = Album::where('organization_id', $org_id)->whereMonth('created_at', date('m'))->get();
        $albums_lastmth  = Album::where('organization_id', $org_id)->whereMonth('created_at', date('m', strtotime("-1 month")))->get();

        $album          = Album::where('organization_id', $org_id)->get();
        $album          = collect($album)->pluck('id');
        $galleries      = Gallery::whereIn('album_id', $album)->get();
        $galleries      = collect($galleries)->pluck('file_id');
        $file           = File::whereIn('id', $galleries)->get();
        $photo          = collect($file);

        $album          = Album::where('organization_id', $org_id)->whereMonth('created_at', date('m'))->get();
        $album          = collect($album)->pluck('id');
        $galleries      = Gallery::whereIn('album_id', $album)->get();
        $galleries      = collect($galleries)->pluck('file_id');
        $file           = File::whereIn('id', $galleries)->get();
        $photo_thismth  = collect($file);

        $album          = Album::where('organization_id', $org_id)->whereMonth('created_at', date('m', strtotime("-1 month")))->get();
        $album          = collect($album)->pluck('id');
        $galleries      = Gallery::whereIn('album_id', $album)->get();
        $galleries      = collect($galleries)->pluck('file_id');
        $file           = File::whereIn('id', $galleries)->get();
        $photo_lastmth  = collect($file);

        $album_pluck    = Album::select('id')->where('organization_id', $org_id)->pluck('id');
        $gallery_pluck  = Gallery::whereIn('album_id', $album_pluck)->pluck('file_id');
        $post_pluck     = $berita->pluck('id');
        $thumbnail_pluck = $berita->pluck('thumbnail_id');
        $attach_pluck   = PostAttachment::whereIn('post_id', $post_pluck)->pluck('file_id');

        $concat         = $attach_pluck->concat($gallery_pluck)->concat($thumbnail_pluck);

        $org_files      = File::whereIn('id', $concat)->get();
        $files_total    = $org_files->sum('size');
        $files_other    = $org_files->whereNotIn('extension', ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'pdf'])->sum('size');
        $files_pdf      = $org_files->whereIn('extension', ['pdf'])->sum('size');
        $files_img      = $org_files->whereIn('extension', ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])->sum('size');

        $posts_total    = $berita->count();
        $posts_array    = array();
        $this_year      = (date('m') >= 7) ? date('Y') : date('Y') - 1;
        for ($i = 7; $i <= 12; $i++) {
            $post_count = Post::where('organization_id', $org_id)->whereYear('created_at', $this_year)->whereMonth('created_at', $i);
            $posts_array[$i] = $post_count->count();
        }

        $this_year      = (date('m') < 7) ? date('Y') : date('Y') + 1;
        for ($i = 1; $i <= 6; $i++) {
            $post_count = Post::where('organization_id', $org_id)->whereYear('created_at', $this_year)->whereMonth('created_at', $i);
            $posts_array[$i] = $post_count->count();
        }

        $this_year = collect([$posts_array])->collapse();

        return view('auth.dasbor', [
            'title'         => 'Dasbor',
            'organizations' => $organizations->load(['organization']),
            'berita'        => $posts_total,
            'berita_stat'   => $berita_thismth->count() - $berita_lastmth->count(),
            'album'         => $albums->count(),
            'album_stat'    => $albums_thismth->count() - $albums_lastmth->count(),
            'foto'          => $photo->count(),
            'foto_stat'     => $photo_thismth->count() - $photo_lastmth->count(),
            'berkas'        => $this->convert_size($photo->sum('size')),
            'berkas_stat'   => $this->convert_size(abs($photo_thismth->sum('size') - $photo_lastmth->sum('size'))),
            'files_total'   => $files_total,
            'files_img'     => $files_total == 0 ? 0 : round(($files_img / $files_total) * 100),
            'files_pdf'     => $files_total == 0 ? 0 : round(($files_pdf / $files_total) * 100),
            'files_other'   => $files_total == 0 ? 0 : round(($files_other / $files_total) * 100),
            'posts_total'   => $posts_total,
            'this_year'     => $this_year,
        ]);
    }

    public function sebagai(Organization $organization)
    {
        $user   = auth()->user()->id;
        $get    = OrganizationMember::where('organization_id', $organization->id)->where('member_id', $user)->get();
        if ($get->count() > 0)
            session([
                'run_as' => $organization->id,
                'as_org' => $organization->name
            ]);

        return redirect('/dasbor');
    }

    public function authenticate(Request $request)
    {
        $request->merge([
            'email' => $request->email . '@sman24jakarta.sch.id',
        ]);

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) return redirect('/masuk')->withErrors(['Pengguna tidak ditemukan']);

        $organizations = OrganizationMember::where('member_id', $user->id)->where('role', 'k')->first();
        if (!$organizations) return redirect('/masuk')->withErrors(['Anda bukan pengelola']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $organization = Organization::find($organizations->organization_id);
            session(['run_as' => $organization->id, 'as_org' => $organization->name]);
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/users.log'),
            ])->info("[LOGIN] [1] [$user->id]");
            return redirect()->intended('/dasbor');
        }

        return redirect('/masuk')->withErrors(['Pengguna / kata sandi tidak cocok']);
    }

    public function keluar()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/masuk');
    }

    public function view_password()
    {
        return view('auth.kata_sandi');
    }

    public function change_password(Request $request)
    {
        try {
            $user       = auth()->user()->id;
            $password   = $request->password;
            User::where('id', $user)->update(['password' => Hash::make($password)]);
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/users.log'),
            ])->info("[CHANGE_PASSWORD] [1] [$user]");
            return redirect('kata-sandi')->with('success', 'Sandi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect('kata-sandi')->with('failed', $e->getMessage());
        }
    }

    public function convert_size($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
