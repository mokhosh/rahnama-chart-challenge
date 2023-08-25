<?php

test('it can group field participants by age group', function () {
    $this->seed();
    $field = \App\Models\Field::first();

    $results = (new \App\Services\ChartService)->fieldParticipantsByAgeGroup($field);

    expect($results)->toEqual([
        '16-20' => 10,
    ]);
});

test('it can query chart data in the expected format', function () {
    $this->seed();

    $results = (new \App\Services\ChartService)->getParticipantCountByAgeRangeAndField();

    expect($results)->toEqual([
        [
            'field' => 'first field',
            'participants' => [
                '16-20' => 10,
            ],
            'examiners' => [
                '6-10' => 20,
                '11-16' => 20,
                '16-20' => 10,
            ],
        ],
        [
            'field' => 'second field',
            'participants' => [],
            'examiners' => [],
        ],
        [
            'field' => 'third field',
            'participants' => [
                '6-10' => 20,
                '11-16' => 20,
            ],
            'examiners' => [],
        ],
        [
            'field' => 'fourth field',
            'participants' => [],
            'examiners' => [],
        ],
    ]);
});
