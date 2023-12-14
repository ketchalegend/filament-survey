<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use MattDaneshvar\Survey\Models\Survey as BaseSurvey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Survey extends BaseSurvey
{
    use HasFactory;

    protected $fillable = ['name', 'settings', 'description'];


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

            if (!$survey->uuid) {
                $survey->uuid = (string) Str::uuid();
            }
        });
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
