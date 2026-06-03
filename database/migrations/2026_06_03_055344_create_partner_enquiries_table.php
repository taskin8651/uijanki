<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('partner_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('partner_type')->nullable();
            $table->string('city')->nullable();
            $table->longText('message')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('consent')->default(0);
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partner_enquiries');
    }
}