<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AudioFile extends Model
{
    protected $fillable = [
        'user_id',
        'filename',
        'original_name',
        'path',
        'file_size',
        'duration',
        'mime_type',
        'isrc_code',
        'song_title',
        'fingerprint',
        'fingerprint_hash'
    ];

     /**
     * Get the user that owns the audio file
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
