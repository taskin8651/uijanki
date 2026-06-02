<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteServicesTable extends Migration
{
    public function up()
    {
        Schema::create('website_services', function (Blueprint $table) {
            $table->id();

            $table->string('badge_text')->nullable();
            $table->string('title')->nullable();
            $table->string('highlight_title')->nullable();
            $table->longText('description')->nullable();

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

            $table->string('floating_one_title')->nullable();
            $table->string('floating_one_subtitle')->nullable();

            $table->string('floating_two_title')->nullable();
            $table->string('floating_two_subtitle')->nullable();

            $table->string('stats_title')->nullable();
            $table->string('stats_subtitle')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_services');
    }
}