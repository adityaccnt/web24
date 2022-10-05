<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Learning;
use Illuminate\Http\Request;
use App\Models\StudentRombel;
use Illuminate\Support\Facades\Session;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rombel)
    {
        $learning   = Learning::select('id', 'teacher_id', 'subject_id', 'student_id')->where('subject_id', Session::get('run_subject'))->where('teacher_id', auth()->user()->id)->get();
        $learnings  = $learning->pluck('id');
        $in         = $learning->pluck('student_id');
        $stundents  = StudentRombel::select('users.id', 'users.name')->join('users', 'users.id', '=', 'student_rombels.student_id')->where('rombel_id', $rombel)->whereIn('users.id', $in)->orderby('users.name')->get();

        if ($rombel > 5) {
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
        // return $scores;

        return view('auth.rapor.nilai', [
            'scores' => $scores,
            'rombel' => $rombel
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
    public function store(Request $request, $rombel)
    {
        if ($rombel > 5) {
            foreach ($request->learning_id as $key => $value) {
                if ($request->uh1[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 1,
                        ],
                        [
                            'score' => $request->uh1[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 1)->delete();
                }


                if ($request->rh1[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 2,
                        ],
                        [
                            'score' => $request->rh1[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 3)->delete();
                }


                if ($request->uh2[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 3,
                        ],
                        [
                            'score' => $request->uh2[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 2)->delete();
                }

                if ($request->rh2[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 4,
                        ],
                        [
                            'score' => $request->rh2[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 4)->delete();
                }

                if ($request->k1[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 7,
                        ],
                        [
                            'score' => $request->k1[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 7)->delete();
                }

                if ($request->rk1[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 8,
                        ],
                        [
                            'score' => $request->rk1[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 8)->delete();
                }

                if ($request->sikap[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 9,
                        ],
                        [
                            'score' => $request->sikap[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 9)->delete();
                }

                if ($request->pts[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 10,
                        ],
                        [
                            'score' => $request->pts[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 10)->delete();
                }
            }
        } else {
            foreach ($request->learning_id as $key => $value) {
                if ($request->sum1[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 5,
                        ],
                        [
                            'score' => $request->sum1[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 1)->delete();
                }


                if ($request->sum2[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 6,
                        ],
                        [
                            'score' => $request->sum2[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 3)->delete();
                }

                if ($request->sikap[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 9,
                        ],
                        [
                            'score' => $request->sikap[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 9)->delete();
                }

                if ($request->pts[$key]) {
                    Score::updateOrInsert(
                        [
                            'learning_id' => $value,
                            'score_code_id' => 10,
                        ],
                        [
                            'score' => $request->pts[$key],
                        ]
                    );
                } else {
                    Score::where('learning_id', $value)->where('score_code_id', 10)->delete();
                }
            }
        }

        return back()->with('success', 'Berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
