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
        Schema::create('institution_stand_requests', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('id')->unique()->constrained('stand_requests')->onDelete('CASCADE');
            $table->foreignId('institution_id')->constrained()->onDelete('CASCADE');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_stand_requests');
    }
};
