<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistrationEnquiry extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'registration_enquiries';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'enquiry_type',
        'interested_program',
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