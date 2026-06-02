<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('event_type')->nullable(); // upcoming, ongoing, completed
            $table->string('category')->nullable();

            $table->string('title')->nullable();
            $table->longText('short_description')->nullable();

            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();

            $table->string('status_badge')->nullable();
            $table->integer('progress')->default(0);

            $table->string('info_one_title')->nullable();
            $table->string('info_one_text')->nullable();

            $table->string('info_two_title')->nullable();
            $table->string('info_two_text')->nullable();

            $table->string('button_one_text')->nullable();
            $table->string('button_one_link')->nullable();

            $table->string('button_two_text')->nullable();
            $table->string('button_two_link')->nullable();

            $table->integer('people_reached')->default(0);
            $table->integer('families_supported')->default(0);
            $table->integer('youth_guided')->default(0);

            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}