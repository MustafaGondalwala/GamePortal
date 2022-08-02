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
        Schema::create('answer_portals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->nullable()->constrained('questions');
            $table->morphs('user');
            $table->date('first_request_date')->nullable();
            $table->date('last_request_date')->nullable();
            $table->integer('request_count')->nullable();
            $table->integer('priority_score')->nullable();
            $table->float('answer_price')->nullable();
            $table->foreignId('committed_by')->nullable()->constrained('tutors');
            $table->date('commit_date')->nullable();
            $table->integer('commit_validity')->nullable();
            $table->boolean('is_answered')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_portals');
    }
};
