<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Correction extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'sentence_id',
        'corrected_text',
        'explanation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentence()
    {
        return $this->belongsTo(Sentence::class);
    }
}
