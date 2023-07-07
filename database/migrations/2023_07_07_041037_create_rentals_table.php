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
            $table->foreignId('institution_id')->constrained();
            $table->foreignId('stand_id')->constrained();
            $table->foreignId('stand_request_id')->nullable()->constrained();
            $table->date('stand_start_date');
            $table->date('stand_end_date');
            $table->decimal('final_cost', 8, 2);
            $table->string('invoice_name')->nullable()->default('Sin nombre');
            $table->string('invoice_number')->nullable()->default('0');

            $table->foreignId('created_by')->constrained("users", 'id'); //Assesed by
            $table->foreignId('updated_by')->constrained('users', 'id');
            $table->timestamps();
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
