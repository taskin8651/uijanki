<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Campaign extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'campaigns';

    protected $fillable = [
        'category',
        'title',
        'short_description',
        'full_description',
        'location',
        'status_badge',
        'start_date',
        'end_date',
        'raised_amount',
        'goal_amount',
        'supporters',
        'button_one_text',
        'button_one_link',
        'button_two_text',
        'button_two_link',
        'sort_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'raised_amount' => 'decimal:2',
        'goal_amount' => 'decimal:2',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected $appends = [
        'campaign_image',
        'progress_percentage',
        'days_left',
    ];

    public function getCampaignImageAttribute()
    {
        $file = $this->getFirstMedia('campaign_image');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/campaign-education.png');
    }

    public function getProgressPercentageAttribute()
    {
        if (!$this->goal_amount || $this->goal_amount <= 0) {
            return 0;
        }

        $percentage = ($this->raised_amount / $this->goal_amount) * 100;

        return min(round($percentage), 100);
    }

    public function getDaysLeftAttribute()
    {
        if (!$this->end_date) {
            return null;
        }

        $days = now()->startOfDay()->diffInDays($this->end_date->startOfDay(), false);

        if ($days < 0) {
            return 'Closed';
        }

        if ($days == 0) {
            return 'Last Day';
        }

        return $days . ' Days Left';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}