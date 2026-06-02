<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFounderLeadersTable extends Migration
{
    public function up()
    {
        Schema::create('founder_leaders', function (Blueprint $table) {
            $table->id();

            $table->string('role_badge')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();

            $table->json('focus_points')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('founder_leaders');
    }
}