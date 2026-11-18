<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsomniaScreening extends Model
{
    protected $fillable = [
        'participant_name',
        'age',
        'gender',
        'instrument',
        'score',
        'result_label',
        'answers',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'age' => 'integer',
            'score' => 'decimal:2',
            'answers' => 'array',
        ];
    }
}
