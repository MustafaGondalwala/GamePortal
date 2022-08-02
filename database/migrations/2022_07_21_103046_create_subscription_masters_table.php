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
        Schema::create('subscription_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_plan_id')->nullable()->constrained('subscription_plans');
            $table->foreignId('student_id')->nullable()->constrained('students');
            // $table->foreignId('question_type_id')->nullable()->constrained('question_types');
            // $table->foreignId('question_id')->nullable()->constrained('questions');
            $table->foreignId('subscription_status_id')->nullable()->constrained('subscription_statuses');
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
        Schema::dropIfExists('subscription_masters');
    }
};
