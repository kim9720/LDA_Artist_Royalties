<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicTrackInfo extends Model
{
    use HasFactory;

    protected $table = 'music_tracks_info';
    protected $fillable = ['tracked_music_id', 'start_time', 'end_time'];

    public function trackedMusic()
    {
        return $this->belongsTo(TrackedMusic::class, 'tracked_music_id');
    }
}
