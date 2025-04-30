<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackedMusic extends Model
{
    use HasFactory;

    protected $table = 'tracked_music'; // Match your table name
    protected $primaryKey = 'id';

    protected $fillable = [
        'music_id',
        'title',
        'artist',
        'album',
        'release_date',
        'duration',
        'genre',
        'cover_url',
        'language',
        'label',
        'confidence'
    ];

    public function trackInfo()
    {
        return $this->hasOne(MusicTrackInfo::class, 'tarcked_music_id');
    }
}
