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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('mission')->nullable();
            $table->string('mission_photo')->nullable();
            $table->longText('vission')->nullable();
            $table->string('vission_photo')->nullable();
            $table->longText('achievements')->nullable();
            $table->string('achievements_photo')->nullable();
            $table->longText('facilities')->nullable();
            $table->string('facilities_photo')->nullable();
            $table->longText('activities')->nullable();
            $table->string('activities_photo')->nullable();
            $table->string('field_type')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
