<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'G')->orderBy('name')->get();
        return view('auth.pendidik', [
            'users' => $users->load(['position']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::find($user);
        $positions = Position::where('title', 'LIKE', 'guru%')->get();
        return view('auth.pendidik_edit', [
            'user' => $user,
            'positions' => $positions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user = User::find($user);

        if ($request->file('avatar')) {
            $avatar_id    = File::where('id', $user->avatar_id);

            if ($avatar_id->count() > 0) {
                $avatar_get   = $avatar_id->first();
                $avatar_asset = $avatar_get->asset_url;

                if (Storage::exists($avatar_asset)) Storage::delete($avatar_asset);
                if ($avatar_get) $avatar_id->delete();
            }

            $avatar       = $request->file('avatar');
            $avatar_ext   = $avatar->extension();
            $avatar_size  = $avatar->getSize();
            $avatar_path  = $avatar->store('public/avatar');

            $file = File::create([
                'owner_id'  => auth()->user()->id,
                'asset_url' => $avatar_path,
                'extension' => $avatar_ext,
                'size'      => $avatar_size,
                'is_active' => 1,
            ]);
            $file->save();

            User::where('id', $user->id)->update(['avatar_id' => $file->id]);
        }

        User::where('id', $user->id)->update(['position_id' => $request->position, 'name' => $request->name]);

        return redirect('kelola-pendidik')->with('success', 'Data ' . $user->name . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
