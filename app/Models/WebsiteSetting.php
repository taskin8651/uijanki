<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = 'website_settings';

    protected $fillable = [
        'site_name',
        'site_tagline',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'phone_number',
        'phone_display',
        'whatsapp_number',
        'email',
        'short_address',
        'full_address',
        'map_query',
        'map_embed_url',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'footer_description',
        'copyright_text',
        'footer_credit',
        'volunteer_url',
        'donate_url',
        'contact_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends = [
        'logo',
        'favicon',
        'tel_link',
        'whatsapp_link',
        'map_directions_link',
    ];

    public static function defaults(): array
    {
        return [
            'site_name' => 'Janki Social Foundation',
            'site_tagline' => 'Education, Skill Development & Social Welfare NGO',
            'meta_title' => 'Janki Social Foundation | Education, Skill Development & Social Welfare NGO',
            'meta_description' => 'Janki Social Foundation works for education, skill development, women empowerment, youth empowerment, career guidance and community welfare.',
            'meta_keywords' => 'Janki Social Foundation, NGO, Education, Skill Development, Women Empowerment, Youth Empowerment, Donation, CSR, Volunteer',
            'phone_number' => '7979026927',
            'phone_display' => '+91 7979026927',
            'whatsapp_number' => '917979026927',
            'email' => 'info@jankisocialfoundation.org',
            'short_address' => 'Bailey Road, Rajabazar, Patna',
            'full_address' => '302 Chandan Deep Apartment, Bailey Road, Rajabazar, Near Jagdeo Path Pillar No. 1, Patna',
            'map_query' => '302 Chandan Deep Apartment Bailey Road Rajabazar Patna',
            'map_embed_url' => 'https://www.google.com/maps?q=302%20Chandan%20Deep%20Apartment%20Bailey%20Road%20Rajabazar%20Patna&output=embed',
            'facebook_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
            'linkedin_url' => '#',
            'footer_description' => 'Working for education, skill development, vocational training, career guidance, women empowerment, youth empowerment and community welfare.',
            'copyright_text' => '© 2026 Janki Social Foundation. All Rights Reserved.',
            'footer_credit' => 'Designed with care for social impact.',
            'volunteer_url' => 'volunter',
            'donate_url' => 'donate',
            'contact_url' => 'contact',
            'status' => 1,
        ];
    }

    public static function current(): self
    {
        $setting = static::where('status', 1)->first() ?: static::first();

        if ($setting) {
            return $setting;
        }

        return new static(static::defaults());
    }

    public static function firstOrCreateDefault(): self
    {
        return static::first() ?: static::create(static::defaults());
    }

    public function getLogoAttribute(): string
    {
        $file = $this->getFirstMedia('logo');

        return $file ? $file->getUrl() : asset('assets/img/JankiNGOLogo.png');
    }

    public function getFaviconAttribute(): string
    {
        $file = $this->getFirstMedia('favicon');

        return $file ? $file->getUrl() : asset('favicon.ico');
    }

    public function getTelLinkAttribute(): string
    {
        return preg_replace('/\D+/', '', $this->phone_number ?: '7979026927');
    }

    public function getWhatsappLinkAttribute(): string
    {
        return preg_replace('/\D+/', '', $this->whatsapp_number ?: $this->phone_number ?: '917979026927');
    }

    public function getMapDirectionsLinkAttribute(): string
    {
        $query = $this->map_query ?: $this->full_address ?: '302 Chandan Deep Apartment Bailey Road Rajabazar Patna';

        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($query);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
