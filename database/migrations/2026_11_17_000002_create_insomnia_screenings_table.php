<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('insomnia_screenings', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name', 80);
            $table->unsignedTinyInteger('age');
            $table->string('gender', 20);
            $table->string('instrument', 32)->index();
            $table->decimal('score', 5, 2);
            $table->string('result_label', 120);
            $table->json('answers')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index(['instrument', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insomnia_screenings');
    }
};
