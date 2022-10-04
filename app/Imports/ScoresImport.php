<?php

namespace App\Imports;

use App\Models\Score;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScoresImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        if (isset($rows[0]['2022'])) {
            foreach ($rows as $row) {
                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2022'],
                        'score_code_id' => 5
                    ],
                    [
                        'score'         => $row['s1'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2022'],
                        'score_code_id' => 6
                    ],
                    [
                        'score'         => $row['s2'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2022'],
                        'score_code_id' => 10
                    ],
                    [
                        'score'         => $row['pts'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2022'],
                        'score_code_id' => 9
                    ],
                    [
                        'score'         => $row['sikap'],
                    ]
                );
            }
        }elseif (isset($rows[0]['2013'])) {
            foreach ($rows as $row) {
                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 1
                    ],
                    [
                        'score'         => $row['uh1'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 3
                    ],
                    [
                        'score'         => $row['uh2'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 3
                    ],
                    [
                        'score'         => $row['rh1'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 2
                    ],
                    [
                        'score'         => $row['rh2'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 7
                    ],
                    [
                        'score'         => $row['k1'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 8
                    ],
                    [
                        'score'         => $row['rk1'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 10
                    ],
                    [
                        'score'         => $row['pts'],
                    ]
                );

                Score::updateOrCreate(
                    [
                        'learning_id'   => $row['2013'],
                        'score_code_id' => 9
                    ],
                    [
                        'score'         => $row['sikap'],
                    ]
                );
            }
        }
    }
}
