<?php

test('it can query chart data in the expected format', function () {
    $this->seed();

    $results = (new \App\Services\ChartService)->getParticipantCountByAgeRangeAndField();

    expect($results)->toBe([
        [
            'field' => 'first field',
            'participants' => [
                '6-10' => 20,
                '11-16' => 20,
                '16-20' => 20,
            ],
            'examiners' => [
                '6-10' => 20,
                '11-16' => 20,
                '16-20' => 20,
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
            'examiners' => [
                '6-10' => 20,
                '11-16' => 20,
            ],
        ],
        [
            'field' => 'fourth field',
            'participants' => [],
            'examiners' => [],
        ],
    ]);
});
