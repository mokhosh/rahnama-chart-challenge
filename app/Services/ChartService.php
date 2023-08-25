<?php

namespace App\Services;

use App\Models\Field;

class ChartService
{
    public function getParticipantCountByAgeRangeAndField(): array
    {
        return Field::get()
            ->map(function ($field) {
                return [
                    'field' => $field->title,
                    'participants' => $field->participantsByAgeGroup(),
                    'examiners' => $field->examinersByAgeGroup(),
                ];
            })
            ->toArray();
    }
}
