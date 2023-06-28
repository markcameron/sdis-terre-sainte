<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class News extends Model
{
    use HasBlocks;
    use HasSlug;
    use HasMedias;
    use HasFiles;
    use HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'teaser',
    ];

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'cover' => [
            'orig' => [
                [
                    'name' => 'orig',
                ],
            ],
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ],
            ],
            'teaser' => [
                [
                    'name' => 'teaser',
                    'ratio' => 3 / 2,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 3 / 2,
                ],
            ],
        ],
    ];
}
