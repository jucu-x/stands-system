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
            $table->text('why')->nullable();
            $table->text('request_message')->nullable();
            $table->timestamp('stand_start_date')->nullable();
            $table->timestamp('stand_end_date')->nullable();
            $table->boolean('attended')->default(false);
            $table->timestamps();

            $table->foreignId('stand_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('attended_by')->nullable()->constrained('users', 'id')->onDelete('SET NULL');
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
