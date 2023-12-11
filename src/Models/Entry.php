<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MattDaneshvar\Survey\Models\Entry as ModelsEntry;

class Entry extends ModelsEntry
{
    use HasFactory;
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
