<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ScreeningQuestion extends Model
{
    protected $fillable = [
        'instrument',
        'question_text',
        'options',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeForInstrument(Builder $query, string $instrument): Builder
    {
        return $query
            ->where('instrument', $instrument)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
