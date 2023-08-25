<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    public function examiner()
    {
        return $this->hasOne(Examiner::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
