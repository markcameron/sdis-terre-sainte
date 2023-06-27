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
                // 'home_heros' => [
                //     'name' => 'Home Hero',
                //     'bucketables' => [
                //         [
                //             'module' => 'homepageHeroes',
                //             'name' => 'Homepage Heroes',
                //             'scopes' => ['published' => true],
                //         ],
                //     ],
                //     'max_items' => 10,
                // ],
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
                // 'home_emergency_numbers' => [
                //     'name' => 'Home Emergency Numbers',
                //     'bucketables' => [
                //         [
                //             'module' => 'emergencyNumbers',
                //             'name' => 'Emergency Numbers',
                //             'scopes' => ['published' => true],
                //         ],
                //     ],
                //     'max_items' => 4,
                // ],
            ],
        ],
    ],
];
