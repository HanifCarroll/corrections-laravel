<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Sentence extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'post_id',
        'sentence_number',
        'original_text',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function corrections()
    {
        return $this->hasMany(Correction::class);
    }
}
