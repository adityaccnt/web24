<?php

namespace App\Exports;

use App\Models\Score;
use App\Models\Learning;
use App\Models\Rombel;
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
        $rombel_id  = $this->rombel_id;
        $learning   = Learning::select('id', 'teacher_id', 'subject_id', 'student_id')->where('subject_id', Session::get('run_subject'))->where('teacher_id', auth()->user()->id)->get();
        $learnings  = $learning->pluck('id');
        $in         = $learning->pluck('student_id');
        $stundents  = StudentRombel::select('users.id', 'users.name')->join('users', 'users.id', '=', 'student_rombels.student_id')->where('rombel_id', $rombel_id)->whereIn('users.id', $in)->orderby('users.name')->get();

        if ($rombel_id > 5) {
            $curriculum = 2013;
            $uh1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 1)->get()->keyBy('learning_id');
            $rh1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 2)->get()->keyBy('learning_id');
            $uh2        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 3)->get()->keyBy('learning_id');
            $rh2        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 4)->get()->keyBy('learning_id');
            $k1         = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 7)->get()->keyBy('learning_id');
            $rk1        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 8)->get()->keyBy('learning_id');
            $sikap      = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 9)->get()->keyBy('learning_id');
            $pts        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 10)->get()->keyBy('learning_id');

            $learningKey   = $learning->keyBy('student_id');

            $scores = [];
            foreach ($stundents as $key => $stundent) {
                $learning_id    = $learningKey[$stundent->id]['id'];
                $scores[$key]   = $stundent;
                $scores[$key]['learning_id'] = $learning_id;
                if (isset($uh1[$learning_id])) $scores[$key]['uh1'] = $uh1[$learning_id]['score'];
                if (isset($rh1[$learning_id])) $scores[$key]['rh1'] = $rh1[$learning_id]['score'];
                if (isset($uh2[$learning_id])) $scores[$key]['uh2'] = $uh2[$learning_id]['score'];
                if (isset($rh2[$learning_id])) $scores[$key]['rh2'] = $rh2[$learning_id]['score'];
                if (isset($k1[$learning_id])) $scores[$key]['k1'] = $k1[$learning_id]['score'];
                if (isset($rk1[$learning_id])) $scores[$key]['rk1'] = $rk1[$learning_id]['score'];
                if (isset($sikap[$learning_id])) $scores[$key]['sikap'] = $sikap[$learning_id]['score'];
                if (isset($pts[$learning_id])) $scores[$key]['pts'] = $pts[$learning_id]['score'];
            }
        } else {
            $curriculum = 2022;
            $sum1       = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 5)->get()->keyBy('learning_id');
            $sum2       = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 6)->get()->keyBy('learning_id');
            $sikap      = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 9)->get()->keyBy('learning_id');
            $pts        = Score::select('learning_id', 'score', 'score_code_id')->whereIn('learning_id', $learnings)->where('score_code_id', 10)->get()->keyBy('learning_id');

            $learningKey   = $learning->keyBy('student_id');

            $scores = [];
            foreach ($stundents as $key => $stundent) {
                $learning_id    = $learningKey[$stundent->id]['id'];
                $scores[$key]   = $stundent;
                $scores[$key]['learning_id'] = $learning_id;
                if (isset($sum1[$learning_id])) $scores[$key]['sum1'] = $sum1[$learning_id]['score'];
                if (isset($sum2[$learning_id])) $scores[$key]['sum2'] = $sum2[$learning_id]['score'];
                if (isset($sikap[$learning_id])) $scores[$key]['sikap'] = $sikap[$learning_id]['score'];
                if (isset($pts[$learning_id])) $scores[$key]['pts'] = $pts[$learning_id]['score'];
            }
        }

        return view('auth.rapor.export', [
            'scores'    => $scores,
            'rombel_id' => $rombel_id,
            'curriculum' => $curriculum,
        ]);
    }

    public function title(): string
    {
        return Rombel::find($this->rombel_id)->name;
    }
}
