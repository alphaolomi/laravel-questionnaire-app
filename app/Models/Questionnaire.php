<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'description',
        'expires_at',
        'user_id',
    ];


    // relationships
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
