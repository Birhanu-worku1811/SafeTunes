<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Album extends Model
{
    use HasFactory, LogsActivity;

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

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        // TODO: Implement getActivitylogOptions() method.
        return LogOptions::defaults()
            ->logOnly(['title', 'artist_id', 'release_date', 'cover_image', 'description']);
    }
}
