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
        Schema::create('language_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('type');
            $table->float('overall_score',8,1);
            $table->float('reading_score',8,1);
            $table->float('writing_score',8,1);
            $table->float('listening_score',8,1);
            $table->float('speaking_score',8,1);
            $table->string('expire_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_scores');
    }
};
