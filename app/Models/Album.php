<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'release_date',
        'cover_image',
        'description'
    ];

    public function musics():HasMany
    {
        return $this->hasMany(Music::class);
    }
}
