<?php

return [
    'locale' => 'fr',
    'fallback_locale' => 'fr',

    'enabled' => [
        'buckets' => true,
    ],

    'buckets' => [
        'homepage' => [
            'name' => 'Home Stats',
            'buckets' => [
                'home_heros' => [
                    'name' => 'Home Hero',
                    'bucketables' => [
                        [
                            'module' => 'homepageHeroes',
                            'name' => 'Homepage Heroes',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 10,
                ],
                'home_stats' => [
                    'name' => 'Home Stats',
                    'bucketables' => [
                        [
                            'module' => 'stats',
                            'name' => 'Stats',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 5,
                ],
                'home_emergency_numbers' => [
                    'name' => 'Home Emergency Numbers',
                    'bucketables' => [
                        [
                            'module' => 'emergencyNumbers',
                            'name' => 'Emergency Numbers',
                            'scopes' => ['published' => true],
                        ],
                    ],
                    'max_items' => 4,
                ],
            ],
        ],
    ],

    'block_editor' => [
        // 'use_twill_blocks' => [],
        'crops' => [
            'image' => [
                'desktop' => [
                    [
                        'name' => 'desktop',
                        'ratio' => 16 / 9,
                    ],
                ],
                'mobile' => [
                    [
                        'name' => 'mobile',
                        'ratio' => 1,
                    ],
                ],
                'free' => [
                    [
                        'name' => 'free',
                        'ratio' => 0,
                    ],
                ],
            ],
        ],
    ],
];
