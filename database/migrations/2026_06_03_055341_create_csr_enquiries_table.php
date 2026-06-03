<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsrEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('csr_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('focus_area')->nullable();
            $table->string('partnership_type')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('csr_enquiries');
    }
}