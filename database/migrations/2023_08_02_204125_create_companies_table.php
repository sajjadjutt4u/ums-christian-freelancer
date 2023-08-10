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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner_name');
            $table->string('email');
            $table->string('password');
            $table->string('city');
            $table->string('country');
            $table->string('address');
            $table->string('industry');
            $table->string('state')->nullable(); //  states should be ( guest , unverified , verified )
            $table->string('description')->nullable();
            $table->string('website_url')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('docs')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
