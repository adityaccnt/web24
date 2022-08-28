<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Organization;
use App\Models\OrganizationGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::select('name', 'coach_id', 'slug', 'is_active')->where('status', 'ekskul')->orWhere('status', 'osis')->orderBy('name')->get();
        return view('auth.osis', [
            'organizations' => $organizations->load('coach')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('auth.osis_tambah');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::where('slug', $id)->firstOrFail();
        $users = User::where('role', 'G')->where('is_active', 1)->orderBy('name')->get();
        // OrganizationGallery::select('file_id')->where('organization_id', $organization->id)->pluck('file_id');
        return view('auth.osis_show', [
            'organization'  => $organization,
            'users'         => $users,
            'galleries'     => OrganizationGallery::where('organization_id', $organization->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $osis)
    {
        return $request;
        if ($request->thumbnail) {
            Organization::where('slug', $osis)->update(['thumbnail_id' => $request->id]);
            return redirect('kelola-osis/' . $osis)->with('success', 'Foto utama berhasil diganti');
        }

        if ($request->thumbnail) {
            Organization::where('slug', $osis)->update(['thumbnail_id' => $request->id]);
            return redirect('kelola-osis/' . $osis)->with('success', 'Foto utama berhasil diganti');
        }

        $osis = Organization::where('slug', $osis)->firstOrFail();

        $osis->update([
            'slug'           => $request->slug,
            'name'           => $request->name,
            'coach_id'       => $request->coach,
            'head_name'      => $request->head_name,
            'active_members' => $request->active_members,
            'whatsapp'       => $request->whatsapp,
            'instagram'      => $request->instagram,
            'description'    => $request->description,
            'is_active'      => ($request->is_active == 'on') ? 1 : 0,
        ]);

        if ($request->file('logo')) {
            $logo_id    = File::where('id', $osis->logo_id);

            if ($logo_id->count() > 0) {
                $logo_get   = $logo_id->first();
                $logo_asset = $logo_get->asset_url;

                if (Storage::exists($logo_asset)) Storage::delete($logo_asset);
                if ($logo_get) $logo_id->delete();
            }

            $logo       = $request->file('logo');
            $logo_ext   = $logo->extension();
            $logo_size  = $logo->getSize();
            $logo_path  = $logo->store('public/osis');

            $file = File::create([
                'owner_id'  => auth()->user()->id,
                'asset_url' => $logo_path,
                'extension' => $logo_ext,
                'size'      => $logo_size,
                'is_active' => 1,
            ]);
            $file->save();

            $osis->update(['logo_id'   => $file->id]);
        }

        if ($request->file('albums')) {
            foreach ($request->file('albums') as $photo) {
                $photo_ext  = $photo->extension();
                $photo_size = $photo->getSize();
                $photo_path = $photo->store('public/org_galleries');

                $file = File::create([
                    'owner_id'  => auth()->user()->id,
                    'asset_url' => $photo_path,
                    'extension' => $photo_ext,
                    'size'      => $photo_size,
                    'is_active' => 1,
                ]);
                $file->save();

                OrganizationGallery::create([
                    'organization_id'   => $osis->id,
                    'file_id'           => $file->id,
                ]);

                $osis->update(['thumbnail_id' => $file->id]);
            }
        }

        return redirect('kelola-osis')->with('success', $request->name . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $url)
    {
        $file   = File::where('id', $request->id);
        $first  = $file->first();
        Storage::delete($first->asset_url);
        OrganizationGallery::where('file_id', $request->id)->delete();
        $file->delete();
        return redirect('kelola-osis/' . $url)->with('success', 'Foto berhasil dihapus');
    }
}
