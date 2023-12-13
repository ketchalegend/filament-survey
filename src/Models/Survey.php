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

        /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($survey) {
            // Set default settings if not provided
            $defaultSettings = ['accept-guest-entries' => true];
            $survey->settings = array_merge($defaultSettings, $survey->settings ?? []);
        });
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
