<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MattDaneshvar\Survey\Models\Answer as ModelsAnswer;

class Answer extends ModelsAnswer
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
