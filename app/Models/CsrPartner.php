<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CsrPartner extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    public $table = 'csr_partners';

    protected $fillable = [
        'title',
        'short_description',
        'approval_status',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends = [
        'partner_logo',
    ];

    public function getPartnerLogoAttribute()
    {
        $file = $this->getFirstMedia('partner_logo');

        if ($file) {
            return $file->getUrl();
        }

        return asset('assets/img/csr-partner-default.png');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}