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
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->morphs('causerable'); // Add a column to store the type of causer (either 'User' or 'Company')
            $table->string('subject');
            $table->string('request_url');
            $table->string('request_method');
            $table->string('ip');
            $table->json('metadata');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activities');
    }
};
