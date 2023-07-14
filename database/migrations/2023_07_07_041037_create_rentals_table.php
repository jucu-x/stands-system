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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('stand_start_date')->nullable();
            $table->timestamp('stand_end_date')->nullable();
            $table->decimal('final_cost', 8, 2);
            $table->string('invoice_name')->nullable()->default('Sin nombre');
            $table->string('invoice_number')->nullable()->default('0');
            $table->timestamps();

            $table->foreignId('institution_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('stand_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('stand_request_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('created_by')->nullable()->constrained("users", 'id')->onDelete('SET NULL'); //Assesed by
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
