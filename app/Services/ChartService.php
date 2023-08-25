<?php

namespace App\Services;

use App\Models\Competition;
use App\Models\Field;

class ChartService
{
    public function getParticipantCountByAgeRangeAndField(Competition $competition): array
    {
        return Field::query()
            ->whereHas('groups', fn($query) => $query->whereIn('groups.id', $competition->groups()->pluck('id')))
            ->get()
            ->map(function ($field) {
                return [
                    'field' => $field->title,
                    'participants' => $this->fieldParticipantsByAgeGroup($field),
                    'examiners' => $this->fieldExaminersByAgeGroup($field),
                ];
            })
            ->toArray();
    }

    public function fieldParticipantsByAgeGroup(Field $field)
    {
        return $field
            ->participants()
            ->with('challenge.age_range')
            ->get()
            ->countBy('challenge.age_range.title')
            ->toArray();
    }

    public function fieldExaminersByAgeGroup(Field $field)
    {
        return $field
            ->examiners()
            ->with('challenge.age_range')
            ->get()
            ->countBy('challenge.age_range.title')
            ->toArray();
    }
}
