<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->string('category')->nullable();
            $table->string('title')->nullable();

            $table->longText('short_description')->nullable();
            $table->longText('full_description')->nullable();

            $table->string('location')->nullable();
            $table->string('status_badge')->nullable()->default('Active');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->decimal('raised_amount', 12, 2)->nullable()->default(0);
            $table->decimal('goal_amount', 12, 2)->nullable()->default(0);
            $table->integer('supporters')->nullable()->default(0);

            $table->string('button_one_text')->nullable();
            $table->string('button_one_link')->nullable();

            $table->string('button_two_text')->nullable();
            $table->string('button_two_link')->nullable();

            $table->integer('sort_order')->nullable()->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}