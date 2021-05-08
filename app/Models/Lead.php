<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['id'];


    public function form(): BelongsTo
    {
        return $this->BelongsTo(Form::class);
    }
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
