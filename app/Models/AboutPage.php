<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'about_pages';

    protected $fillable = [
        'section_badge',
        'floating_title',
        'floating_subtitle',
        'image_badge',

        'heading',
        'highlight_heading',
        'description_one',
        'description_two',

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

        'mission_title',
        'mission_description',
        'mission_points',

        'vision_title',
        'vision_description',
        'vision_points',

        'purpose_title',
        'purpose_description',
        'purpose_points',

        'status',
    ];

    protected $casts = [
        'mission_points' => 'array',
        'vision_points'  => 'array',
        'purpose_points' => 'array',
        'status'         => 'boolean',
    ];

    protected $appends = [
        'background_image',
    ];

    public function getBackgroundImageAttribute()
    {
        $file = $this->getFirstMedia('background_image');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/ngo-background.png');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}