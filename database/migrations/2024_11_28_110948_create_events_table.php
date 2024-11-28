<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  //

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->timestamp('time');
            $table->integer('duration');
            $table->string('title');
            $table->string('topic');
            $table->string('description');
            $table->binary('image');
            $table->tinyInteger('deleted')->default(0);

            $table->timestamps();

            $table->uuid('teacher_id')->index();
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->uuid('classroom_id')->index();
            $table->foreign('classroom_id')->references('id')->on('classrooms');

            $table->uuid('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses');
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
