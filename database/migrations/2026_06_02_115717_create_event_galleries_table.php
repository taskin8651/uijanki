<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('event_galleries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('event_id');

            $table->json('video_urls')->nullable();

            $table->integer('sort_order')->nullable()->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_galleries');
    }
}