<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Model;

class Stat extends Model
{
    use HasMedias;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public $mediasParams = [
        'icon' => [
            'default' => [
                [
                    'name' => 'default',
                ],
            ],
        ],
    ];
}
