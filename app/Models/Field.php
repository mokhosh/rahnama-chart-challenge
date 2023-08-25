<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    public function age_ranges()
    {
        return $this->belongsToMany(AgeRange::class, 'challenges', null, 'age_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class)->whereDoesntHave('examiner');
    }

    public function examiners()
    {
        return $this->hasMany(Participant::class)->whereHas('examiner');
    }
}
