<?php

test('it can query chart data in the expected format', function () {
    $this->seed();

    $results = (new \App\Services\ChartService)->getParticipantCountByAgeRangeAndField();

    expect($results)->toBe([

    ]);
});
