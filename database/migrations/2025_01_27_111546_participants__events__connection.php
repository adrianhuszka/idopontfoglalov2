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
        Schema::create('Participants_Events_Connection', function (Blueprint $table) {
            $table->timestamps();

            $table->uuid('events_id')->index();
            $table->foreign('events_id')->references('id')->on('events');

            $table->uuid('participants_id')->index();
            $table->foreign('participants_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
