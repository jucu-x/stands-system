<?php

use App\Enums\ExpoSelectorCriteria;
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
        Schema::create('expo_selectors', function (Blueprint $table) {
            $table->id();
            $table->enum('criterion', ExpoSelectorCriteria::values())->unique()->default(ExpoSelectorCriteria::Current->value);
            $table->foreignId('expo_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expo_selectors');
    }
};
