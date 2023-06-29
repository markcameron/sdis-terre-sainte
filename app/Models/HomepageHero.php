<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class HomepageHero extends Model
{
    use HasMedias;

    protected $fillable = [
        'published',
        'title',
        'hero_text',
    ];

    public $mediasParams = [
        'hero' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 16 / 9,
                ],
            ],
        ],
    ];
}
