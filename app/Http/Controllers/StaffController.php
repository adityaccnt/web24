<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'K')->orderBy('name')->get();
        return view('auth.tendik', [
            'users' => $users->load(['position']),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit($user)
    {
        $user = User::find($user);
        $positions = Position::whereBetween('id', [10,15])->get();
        return view('auth.tendik_edit', [
            'user' => $user,
            'positions' => $positions,
        ]);
    }

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

        return redirect('kelola-tendik')->with('success', 'Data ' . $user->name . ' berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        //
    }
}
