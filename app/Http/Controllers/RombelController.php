<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rombel;
use App\Models\StudentRombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels    = Rombel::with('student', 'walas')->get();
        $coacheds   = $rombels->pluck('coach_id');
        $members    = StudentRombel::pluck('student_id');
        $users      = User::where('role', 'S')->whereNotIn('id', $members)->orderby('name')->get();
        $coachs     = User::where('role', 'G')->whereNotIn('id', $coacheds)->orderby('name')->get();
        return view('auth.rapor.rombel', [
            'rombels'   => $rombels,
            'users'     => $users,
            'coachs'    => $coachs,
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
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        //
    }
}
