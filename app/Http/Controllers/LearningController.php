<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rombel;
use App\Models\Subject;
use App\Models\Learning;
use Illuminate\Http\Request;
use App\Exports\LearningExport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users      = User::with('rombel')->where('role', 'S')->orderby('name')->get();
        $teachers   = User::where('role', 'G')->orderby('name')->get();
        $subjects   = Subject::orderby('name')->get();
        $rombels    = Rombel::orderby('name')->get();
        $learnings  = Learning::select(Learning::raw('DISTINCT subject_id, COUNT(*) AS count_pd, teacher_id'))->groupby('subject_id')->groupby('teacher_id')->get();
        return view('auth.rapor.pembelajaran', [
            'users'     => $users,
            'teachers'  => $teachers,
            'subjects'  => $subjects,
            'rombels'   => $rombels,
            'learnings' => $learnings,
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
        if (!$request->student_id)
            return redirect('kelola-pembelajaran')->with('failed', 'Peserta didik tidak ada yang dipilih');

        foreach ($request->student_id as $student_id) {
            Learning::create([
                'teacher_id'    => $request->teacher_id,
                'subject_id'    => $request->subject_id,
                'student_id'    => $student_id,
            ]);
        }

        return redirect('kelola-pembelajaran')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Learning  $Learning
     * @return \Illuminate\Http\Response
     */
    public function show(Learning $Learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learning  $Learning
     * @return \Illuminate\Http\Response
     */
    public function edit(Learning $Learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Learning  $Learning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learning $Learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learning  $Learning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $teacher_id)
    {
        Learning::where('subject_id', $request->subject_id)->where('teacher_id', $teacher_id)->delete();
        return redirect('kelola-pembelajaran')->with('success', 'Data berhasil dihapus');
    }

    public function export_excel($rombel_id)
    {
        $subject_id = Session::get('run_subject');
        $subject    = Subject::find($subject_id)->name;
        return Excel::download(new LearningExport($rombel_id), "Rapor - $subject.xlsx");
    }
}
