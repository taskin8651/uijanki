<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->nullable();
            $table->string('city')->nullable();
            $table->string('interest_area')->nullable();
            $table->string('availability')->nullable();
            $table->string('experience')->nullable();
            $table->longText('address')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteer_registrations');
    }
}