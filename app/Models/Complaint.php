<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'subject',
        'content',
        'attachments',
        'status',
        'submitted_at'
    ];

    protected $casts = [
        'attachments' => 'array',
        'submitted_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function addAttachment($file)
    {
        $path = $file->store('complaints/attachments');

        return $this->attachments()->create([
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize()
        ]);
    }

    public function getAttachmentUrlsAttribute()
    {
        return $this->attachments->map(function ($attachment) {
            return [
                'url' => $attachment->url,
                'name' => $attachment->original_name,
                'type' => $attachment->mime_type,
                'size' => $attachment->size
            ];
        });
    }

    public function scopeWithAttachments($query)
    {
        return $query->has('attachments');
    }
}
