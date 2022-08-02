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
        Schema::create('solution_button_clicks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_type_id')->nullable()->constrained('question_types');
            $table->foreignId('question_id')->nullable()->constrained('questions');
            $table->foreignId('student_id')->nullable()->constrained('students');
            $table->string('country')->nullable();
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
        Schema::dropIfExists('solution_button_clicks');
    }
};
