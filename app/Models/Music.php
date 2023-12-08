<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Music extends Model
{
    use HasFactory;

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
}
