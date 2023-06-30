<?php

namespace App\Models;


use A17\Twill\Models\Model;

class Intervention extends Model
{
    protected $casts = [
        'date' => 'datetime',
    ];

    protected $fillable = [
        'published',
        'title',
        'description',
        'date',
        'type',
        'village',
    ];
}
