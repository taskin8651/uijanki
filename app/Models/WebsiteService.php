<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteService extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'website_services';

    protected $fillable = [
        'badge_text',
        'title',
        'highlight_title',
        'description',

        'point_one_title',
        'point_one_text',
        'point_two_title',
        'point_two_text',
        'point_three_title',
        'point_three_text',

        'button_one_text',
        'button_one_link',
        'button_two_text',
        'button_two_link',

        'floating_one_title',
        'floating_one_subtitle',
        'floating_two_title',
        'floating_two_subtitle',

        'stats_title',
        'stats_subtitle',

        'sort_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status'      => 'boolean',
    ];

    protected $appends = [
        'service_image',
    ];

    public function getServiceImageAttribute()
    {
        $file = $this->getFirstMedia('service_image');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/education-awareness.png');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}