<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::orderBy('published_at')->get();
        return view('auth.prestasi', [
            'achievements' => $achievements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.prestasi_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $foto       = $request->file('foto');
            $foto_ext   = $foto->extension();
            $foto_size  = $foto->getSize();
            $foto_path  = $foto->store('public/achievement');

            $file = File::create([
                'owner_id'  => auth()->user()->id,
                'asset_url' => $foto_path,
                'extension' => $foto_ext,
                'size'      => $foto_size,
                'is_active' => 1,
            ]);
            $file->save();

            Achievement::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'event'         => $request->event,
                'level'         => $request->level,
                'published_at'  => $request->published_at,
                'file_id'       => $file->id,
            ]);

            return redirect('kelola-prestasi')->with('success', 'Prestasi baru berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('kelola-prestasi')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show($achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit($achievement)
    {
        $achievement = Achievement::where('id', $achievement)->firstOrFail();
        return view('auth.prestasi_ubah', [
            'achievement' => $achievement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $achievement)
    {
        try {
            $achievement = Achievement::where('id', $achievement);

            if ($request->file('foto')) {
                $foto       = $request->file('foto');
                $foto_ext   = $foto->extension();
                $foto_size  = $foto->getSize();
                $foto_path  = $foto->store('public/achievement');
                
                $file = File::create([
                    'owner_id'  => auth()->user()->id,
                    'asset_url' => $foto_path,
                    'extension' => $foto_ext,
                    'size'      => $foto_size,
                    'is_active' => 1,
                ]);
                $file->save();
                
                $first      = $achievement->first();
                $asset_url  = $first->file->asset_url;
                Storage::delete($asset_url);

                $achievement->update(['file_id' => $file->id]);
            }

            $achievement->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'event'         => $request->event,
                'level'         => $request->level,
                'published_at'  => $request->published_at,
            ]);

            return redirect('kelola-prestasi')->with('success', 'Prestasi baru berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect('kelola-prestasi')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
