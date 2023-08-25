<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function fields()
    {
        return $this->belongsToMany(Field::class)->withPivot('competition_id');
    }
}
