<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CsrEnquiry extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'csr_enquiries';

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'city',
        'budget_range',
        'focus_area',
        'partnership_type',
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