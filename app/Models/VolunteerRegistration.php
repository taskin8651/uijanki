<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VolunteerRegistration extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'volunteer_registrations';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'age',
        'city',
        'interest_area',
        'availability',
        'experience',
        'address',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}