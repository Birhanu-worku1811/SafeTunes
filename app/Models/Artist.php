<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'genre',
        'band_name',
        'instrument'
    ];

    public function music():HasMany
    {
        return $this->hasMany(Music::class);
    }
}
