<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsrPartnersTable extends Migration
{
    public function up()
    {
        Schema::create('csr_partners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('approval_status', ['approved', 'pending'])->default('pending');
            $table->integer('sort_order')->default(0)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('csr_partners');
    }
}