<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPagesTable extends Migration
{
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // NGO Background Section
            $table->string('section_badge')->nullable();
            $table->string('floating_title')->nullable();
            $table->string('floating_subtitle')->nullable();
            $table->string('image_badge')->nullable();

            $table->string('heading')->nullable();
            $table->string('highlight_heading')->nullable();
            $table->longText('description_one')->nullable();
            $table->longText('description_two')->nullable();

            $table->string('point_one_title')->nullable();
            $table->text('point_one_text')->nullable();

            $table->string('point_two_title')->nullable();
            $table->text('point_two_text')->nullable();

            $table->string('point_three_title')->nullable();
            $table->text('point_three_text')->nullable();

            $table->string('button_one_text')->nullable();
            $table->string('button_one_link')->nullable();

            $table->string('button_two_text')->nullable();
            $table->string('button_two_link')->nullable();

            // Mission
            $table->string('mission_title')->nullable();
            $table->longText('mission_description')->nullable();
            $table->json('mission_points')->nullable();

            // Vision
            $table->string('vision_title')->nullable();
            $table->longText('vision_description')->nullable();
            $table->json('vision_points')->nullable();

            // Purpose
            $table->string('purpose_title')->nullable();
            $table->longText('purpose_description')->nullable();
            $table->json('purpose_points')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_pages');
    }
}