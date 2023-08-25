<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function age_range()
    {
        return $this->belongsTo(AgeRange::class, 'age_id');
    }
}
