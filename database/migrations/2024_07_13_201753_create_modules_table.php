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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('comment')->nullable();
            $table->longText('theory');
            $table->longText('task');
            $table->string('video_link')->nullable();
            $table->string('view_avatar')->nullable();
            $table->enum('stat', ['theory', 'practice'])->default('practice');
            $table->enum('status', ['necessarily', 'not necessary'])->default('necessarily');
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
