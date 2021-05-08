<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'question', 'form_id'];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class);
    }
}
