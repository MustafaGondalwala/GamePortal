<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_clarifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->constrained('tutors');
            $table->integer('section_number')->nullable();
            $table->text('clarification_msg')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_clarifications');
    }
};
