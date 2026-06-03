<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_tagline')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->string('phone_number')->nullable();
            $table->string('phone_display')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('short_address')->nullable();
            $table->text('full_address')->nullable();
            $table->text('map_query')->nullable();
            $table->text('map_embed_url')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->text('footer_description')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('footer_credit')->nullable();

            $table->string('volunteer_url')->nullable();
            $table->string('donate_url')->nullable();
            $table->string('contact_url')->nullable();

            $table->string('contact_badge')->nullable();
            $table->string('contact_heading')->nullable();
            $table->string('contact_highlight')->nullable();
            $table->text('contact_description')->nullable();
            $table->string('map_badge')->nullable();
            $table->string('map_heading')->nullable();
            $table->string('map_highlight')->nullable();
            $table->text('map_description')->nullable();
            $table->string('contact_detail_badge')->nullable();
            $table->string('contact_detail_heading')->nullable();
            $table->string('contact_detail_highlight')->nullable();
            $table->text('contact_detail_description')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
