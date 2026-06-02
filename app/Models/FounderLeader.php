<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FounderLeader extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'founder_leaders';

    protected $fillable = [
        'role_badge',
        'name',
        'description',
        'focus_points',
        'sort_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'focus_points' => 'array',
        'is_featured'  => 'boolean',
        'status'       => 'boolean',
    ];

    protected $appends = [
        'leader_image',
    ];

    public function getLeaderImageAttribute()
    {
        $file = $this->getFirstMedia('leader_image');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/default-founder.png');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}