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
        Schema::create('answer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('answer_id')->nullable()->constrained('answers');
            $table->foreignId('tutor_id')->nullable()->constrained('tutors');
            $table->float('price')->nullable();
            $table->float('reward')->nullable();
            $table->float('penalty')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('answer_details');
    }
};
