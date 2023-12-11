<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use MattDaneshvar\Survey\Models\Survey as BaseSurvey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Survey extends BaseSurvey
{
    use HasFactory;
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
