<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'events';

    protected $fillable = [
        'event_type',
        'category',
        'title',
        'short_description',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'status_badge',
        'progress',
        'info_one_title',
        'info_one_text',
        'info_two_title',
        'info_two_text',
        'button_one_text',
        'button_one_link',
        'button_two_text',
        'button_two_link',
        'people_reached',
        'families_supported',
        'youth_guided',
        'sort_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected $appends = [
        'event_image',
    ];

    public function getEventImageAttribute()
    {
        $file = $this->getFirstMedia('event_image');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/upcoming-event-main.png');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}