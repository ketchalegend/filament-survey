<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MattDaneshvar\Survey\Models\Section as BaseSection;

class Section extends BaseSection
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}