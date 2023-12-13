<?php

return [

    'resources' => [
        'QuestionResource' => \Ketchalegend\FilamentSurvey\Resources\QuestionResource::class,
        'SectionResource' => \Ketchalegend\FilamentSurvey\Resources\SectionResource::class,
        'SurveyResource' => \Ketchalegend\FilamentSurvey\Resources\SurveyResource::class,
    ],

    'languages' => [
        'en' => 'English',
    ],

    'navigation' => [
        'answer' => [
            'sort' => 4,
            'icon' => 'heroicon-o-arrow-uturn-left',
        ],
        'entry' => [
            'sort' => 5,
            'icon' => 'heroicon-o-bars-4',
        ],
        'question' => [
            'sort' => 3,
            'icon' => 'heroicon-o-question-mark-circle',
        ],
        'section' => [
            'sort' => 2,
            'icon' => 'heroicon-o-folder-open',
        ],
        'survey' => [
            'sort' => 1,
            'icon' => 'heroicon-o-rectangle-stack',
        ],
    ],

    'actions' => [
        'survey' => [
            'export' => [
                'icon' => 'heroicon-s-arrow-down-tray',
            ],
        ],
    ],

    'question' => [
        'types' => [
            'text' => 'Text',
            'number' => 'Number',
            'radio' => 'Radio',
            'multiselect' => 'Multiselect',
        ],
    ],

];
