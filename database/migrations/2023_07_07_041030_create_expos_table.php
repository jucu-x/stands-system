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
        Schema::create('expos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('version')->nullable();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('description')->nullable();
            $table->string('organizer')->nullable();
            $table->string('logo')->nullable();

            $table->foreignId('created_by')->nullable()->constrained("users", 'id')->onDelete("SET NULL");
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id')->onDelete("SET NULL");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expos');
    }
};
