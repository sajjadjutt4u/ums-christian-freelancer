<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('state')->nullable();  //  states should be ( guest , unverified , verified )
            $table->bigInteger('phone')->nullable();
            $table->string('description')->nullable();
            $table->string('personal_image')->nullable();
            $table->string('business_image')->nullable();
            $table->string('cnic_front_image')->nullable();
            $table->string('cnic_back_image')->nullable();
            $table->string('cv')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->json('last_login_metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
