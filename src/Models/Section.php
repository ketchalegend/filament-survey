<?php

namespace Ketchalegend\FilamentSurvey\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MattDaneshvar\Survey\Models\Section as BaseSection;

class Section extends BaseSection
{
    use HasFactory;


        /**
     * Section constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Override the $fillable property after the parent constructor
        $this->fillable = ['name', 'team_id', 'survey_id'];
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}