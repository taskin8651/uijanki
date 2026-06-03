<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('message_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('message_type')->nullable();
            $table->string('preferred_contact')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_enquiries');
    }
}