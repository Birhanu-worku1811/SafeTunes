<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\HigherOrderCollectionProxy;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Music extends Model
{
    use HasFactory, LogsActivity;

    /**
     * @var HigherOrderCollectionProxy|mixed|string
     */
    public mixed $file_path;
    protected $table = 'musics';

    protected $fillable = [
       'title',
       'album',
        'genre',
        'instrument',
        'band_name',
        'music_file',
        'thumbnail',
        'artist_id',
        'album_id',
    ];

    public function artist():BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function album():BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        // TODO: Implement getActivitylogOptions() method.
        return LogOptions::defaults()
            ->logOnly(['title', 'album', 'genre', 'instrument', 'band_name', 'music_file', 'thumbnail', 'artist_id', 'album_id']);
    }
}
