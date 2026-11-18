<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screening_questions', function (Blueprint $table) {
            $table->id();
            $table->string('instrument', 32)->index();
            $table->text('question_text');
            $table->json('options');
            $table->unsignedSmallInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();

            $table->index(['instrument', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screening_questions');
    }
};
