<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Artist extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'artists';

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'genre',
        'band_name',
        'instrument',
        'photo'
    ];

    public function music():HasMany
    {
        return $this->hasMany(Music::class);
    }

    public function album(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        // TODO: Implement getActivitylogOptions() method.
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'password', 'bio', 'genre', 'band_name', 'instrument']);
    }
}
