<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::orderBy('name')->get();
        return view('auth.facility', [
            'facilities' => $facilities,
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
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit($facility)
    {
        $facility = Facility::find($facility);
        return view('auth.fasilitas_edit', [
            'facility' => $facility,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $facility)
    {
        $facility   = Facility::find($facility);

        if ($request->file('foto')) {
            $asset_url  = File::where('id', $facility->asset_url);

            if ($asset_url->count() > 0) {
                $asset_get   = $asset_url->first();
                $asset_asset = $asset_get->asset_url;

                if (Storage::exists($asset_asset)) Storage::delete($asset_asset);
                if ($asset_get) $asset_url->delete();
            }

            $foto       = $request->file('foto');
            $foto_ext   = $foto->extension();
            $foto_size  = $foto->getSize();
            $foto_path  = $foto->store('public/facilities');

            $file = File::create([
                'owner_id'  => auth()->user()->id,
                'asset_url' => $foto_path,
                'extension' => $foto_ext,
                'size'      => $foto_size,
                'is_active' => 1,
            ]);
            $file->save();

            Facility::where('id', $facility->id)->update(['asset_url' => $file->id]);
        }

        Facility::where('id', $facility->id)->update(['name' => $request->name, 'quantity' => $request->quantity]);

        return redirect('kelola-fasilitas')->with('success', 'Data ' . $facility->name . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
