<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionnaire_id',
        'text',
        'type',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
