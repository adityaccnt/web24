<?php

namespace App\Http\Controllers;

use App\Models\Learning;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rombel;
use App\Models\Score;
use App\Models\StudentRombel;
use App\Models\User;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function rapor(Rombel $rombel)
    {
        $students = StudentRombel::select('student_id', 'rombel_id', 'name')->join('users', 'users.id', '=', 'student_rombels.student_id')->where('rombel_id', $rombel->id)->orderby('users.name')->get();
        return view('auth.rapor.rapor_rombel', [
            'students' => $students
        ]);
    }

    public function unduh_rapor(Rombel $rombel, User $user)
    {
        $subjects   = Learning::select('learnings.id', 'subject_id', 'subjects.name')->where('student_id', $user->id)->join('subjects', 'subjects.id', '=', 'learnings.subject_id')->distinct()->orderby('subjects.maping')->get();
        $score_arr     = [];
        foreach ($subjects as $subject) {
            $learnings = Learning::where('student_id', $user->id)->where('subject_id', $subject->subject_id)->get();
            foreach ($learnings as $learning) {
                $scores = Score::select('score', 'score_code_id')->where('learning_id', $learning->id)->get();
                foreach ($scores as $score) {
                    $score_arr[$subject->subject_id][$score->score_code_id] = $score->score;
                }
            }
        }

        $nip = [
            1 => 'NIP. 197909292014122003',
            'NIPPPPK. 199207252022211005',
            'NIP. 197109152016061001',
            'NIKKI. 1002977',
            'NIPPPPK. 198610292022211003',
            'NIP. 196512291989021002',
            'NIKKI. 1002979',
            'NIP. 196809182017062001',
            'NIP. 199304172019031012',
            'NIKKI. 1002973',
            'NIP. 196601122016111001',
            'NIP. 196510281988122001',
            'NIP. 196406282016062001',
            'NIP. 196404041989032008',
            'NIP. 196505122016062001',
        ];

        if ($rombel->id > 5) {
            return PDF::loadView('auth.rapor.rapor_unduh', array(
                'subjects'  => $subjects,
                'student'   => $user,
                'rombel'   => $rombel->name,
                'scores'    => $score_arr,
                'walas'     => $rombel->walas->name,
                'nip'       => $nip[$rombel->id],
            ))->download($rombel->name . ' - ' . $user->name . '.pdf');
        }else{
            return PDF::loadView('auth.rapor.rapor_unduh_kurmer', array(
                'subjects'  => $subjects,
                'student'   => $user,
                'rombel'   => $rombel->name,
                'scores'    => $score_arr,
                'walas'     => $rombel->walas->name,
                'nip'       => $nip[$rombel->id],
            ))->download($rombel->name . ' - ' . $user->name . '.pdf');
        }
    }

    public function preview_rapor(Rombel $rombel, User $user)
    {
        $subjects   = Learning::select('learnings.id', 'subject_id', 'subjects.name')->where('student_id', $user->id)->join('subjects', 'subjects.id', '=', 'learnings.subject_id')->distinct()->orderby('subjects.maping')->get();
        $score_arr     = [];
        foreach ($subjects as $subject) {
            $learnings = Learning::where('student_id', $user->id)->where('subject_id', $subject->subject_id)->get();
            foreach ($learnings as $learning) {
                $scores = Score::select('score', 'score_code_id')->where('learning_id', $learning->id)->get();
                foreach ($scores as $score) {
                    $score_arr[$subject->subject_id][$score->score_code_id] = $score->score;
                }
            }
        }

        if ($rombel->id > 5) {

            return view('auth.rapor.rapor_pdf', [
                'subjects'  => $subjects,
                'student'   => $user,
                'scores'    => $score_arr,
            ]);
        } else {
            return view('auth.rapor.rapor_pdf_kurmer', [
                'subjects'  => $subjects,
                'student'   => $user,
                'scores'    => $score_arr,
            ]);
        }
    }
}
