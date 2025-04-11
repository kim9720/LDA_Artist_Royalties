<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_id',
        'original_name',
        'path',
        'mime_type',
        'size'
    ];


    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

     public function getSizeInKbAttribute()
     {
         return round($this->size / 1024, 2);
     }
}
