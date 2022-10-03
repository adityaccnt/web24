<?php

namespace App\Exports;

use App\Models\Score;
use App\Models\Learning;
use App\Models\StudentRombel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class LearningExport implements FromView, WithTitle
{
    protected $rombel_id;

    function __construct($rombel_id)
    {
        $this->rombel_id = $rombel_id;
    }

    public function view(): View
    {
        $learning   = Learning::select('id', 'teacher_id', 'subject_id', 'student_id')->where('subject_id', Session::get('run_subject'))->where('teacher_id', auth()->user()->id)->get();
        $learnings  = $learning->pluck('id');
        $in         = $learning->pluck('student_id');
        $stundents  = StudentRombel::select('users.id', 'users.name')->join('users', 'users.id', '=', 'student_rombels.student_id')->where('rombel_id', $this->rombel_id)->whereIn('users.id', $in)->orderby('users.name')->get();

        $uh1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 1)->get();
        $rh1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 2)->get();
        $uh2        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 3)->get();
        $rh2        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 4)->get();
        $k1         = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 7)->get();
        $rk1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 8)->get();
        $sikap      = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 9)->get();
        $pts        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 10)->get();

        $scores = [];
        foreach ($stundents as $key => $stundent) {
            $scores[$key] = $stundent;
            $scores[$key]['learning_id'] = $learning[$key]['id'];
            foreach ($uh1 as $uh1_v) if ($uh1_v->learning_id == $learning[$key]['id']) $scores[$key]['uh1'] = $uh1_v->score;
            foreach ($rh1 as $rh1_v) if ($rh1_v->learning_id == $learning[$key]['id']) $scores[$key]['rh1'] = $rh1_v->score;
            foreach ($uh2 as $uh2_v) if ($uh2_v->learning_id == $learning[$key]['id']) $scores[$key]['uh2'] = $uh2_v->score;
            foreach ($rh2 as $rh2_v) if ($rh2_v->learning_id == $learning[$key]['id']) $scores[$key]['rh2'] = $rh2_v->score;
            foreach ($k1 as $k1_v) if ($k1_v->learning_id == $learning[$key]['id']) $scores[$key]['k1'] = $k1_v->score;
            foreach ($rk1 as $rk1_v) if ($rk1_v->learning_id == $learning[$key]['id']) $scores[$key]['rk1'] = $rk1_v->score;
            foreach ($sikap as $sikap_v) if ($sikap_v->learning_id == $learning[$key]['id']) $scores[$key]['sikap'] = $sikap_v->score;
            foreach ($pts as $pts_v) if ($pts_v->learning_id == $learning[$key]['id']) $scores[$key]['pts'] = $pts_v->score;
        }

        return view('auth.rapor.export', [
            'scores' => $scores
        ]);
    }

    public function title(): string
    {
        return Session::get('run_subject') . '_' . auth()->user()->id;
    }
}
