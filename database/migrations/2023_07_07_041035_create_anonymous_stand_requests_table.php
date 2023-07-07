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
        Schema::create('anonymous_stand_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stand_request_id')->unique()->constrained();
            $table->string('name');
            $table->string('email');
            $table->text('activity')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->string('whatsapp_number', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anonymous_stand_requests');
    }
};
