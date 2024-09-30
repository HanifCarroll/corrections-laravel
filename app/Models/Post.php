<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'title',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }

    public function corrections()
    {
        return $this->hasManyThrough(Correction::class, Sentence::class);
    }
    
}
