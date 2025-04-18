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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('location');
            $table->string('google_meet_link')->nullable();
            $table->enum('visibility', ['public', 'private']);
            $table->enum('reminder_time', ['15min', '30min', '1hr', '2hr', '1day'])->default('15min');
            $table->enum('repeat_time', ['all day', 'sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri'])->default('all day');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
