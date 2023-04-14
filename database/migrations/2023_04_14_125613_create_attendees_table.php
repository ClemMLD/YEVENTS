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
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('attendees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
        Schema::table('events', function (Blueprint $table) {
            $table->string('attendees');
        });
    }
};
