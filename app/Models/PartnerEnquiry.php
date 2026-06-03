<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerEnquiry extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'partner_enquiries';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'organization_name',
        'partner_type',
        'city',
        'message',
        'attachment',
        'consent',
        'is_read',
    ];

    protected $casts = [
        'consent' => 'boolean',
        'is_read' => 'boolean',
    ];

    public function getAttachmentUrlAttribute()
    {
        if ($this->attachment) {
            return asset('storage/' . $this->attachment);
        }

        return null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}