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
        Schema::create('country_details', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->longText('description')->nullable();
            $table->string('first_collapsible_description_title');
            $table->longText('first_collapsible_description')->nullable();
            $table->string('second_collapsible_description_title');
            $table->longText('second_collapsible_description')->nullable();
            $table->string('third_collapsible_description_title');
            $table->longText('third_collapsible_description')->nullable();
            $table->string('country_detail_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_details');
    }
};
