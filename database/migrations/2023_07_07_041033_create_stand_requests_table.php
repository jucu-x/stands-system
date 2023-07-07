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
        Schema::create('stand_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stand_id')->constrained();
            $table->text('why')->nullable();
            $table->text('request_message')->nullable();
            $table->date('stand_start_date');
            $table->date('stand_end_date');
            $table->boolean('attended')->default(false);
            $table->foreignId('attended_by')->constrained('users', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stand_requests');
    }
};
