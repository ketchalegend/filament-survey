<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MattDaneshvar\Survey\Models\Question as BaseQuestion;

class Question extends BaseQuestion
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
