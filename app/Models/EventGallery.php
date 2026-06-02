<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EventGallery extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'event_galleries';

    protected $fillable = [
        'event_id',
        'video_urls',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'video_urls' => 'array',
        'status' => 'boolean',
    ];

    protected $appends = [
        'cover_image',
        'photo_count',
        'video_count',
        'total_media',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getCoverImageAttribute()
    {
        $file = $this->getFirstMedia('gallery_images');

        if ($file) {
            return $file->getUrl();
        }

        return $this->event?->event_image ?? asset('assets/img/event-album-1.png');
    }

    public function getPhotoCountAttribute()
    {
        return $this->getMedia('gallery_images')->count();
    }

    public function getVideoCountAttribute()
    {
        return is_array($this->video_urls) ? count(array_filter($this->video_urls)) : 0;
    }

    public function getTotalMediaAttribute()
    {
        return $this->photo_count + $this->video_count;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}