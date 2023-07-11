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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('code', 4)->unique();
            $table->boolean('partial_time')->default(false);
            $table->decimal('expected_cost', 8, 2)->nullable();
            $table->string('building')->nullable();
            $table->float('x')->nullable()->unique();
            $table->float('y')->nullable()->unique();
            $table->float('width')->nullable();
            $table->float('length')->nullable();

            $table->foreignId('expo_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('created_by')->nullable()->constrained("users", 'id')->onDelete('SET NULL');
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id')->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
