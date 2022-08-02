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
        Schema::create('search_queries', function (Blueprint $table) {
            $table->id();
            $table->longText('queries')->nullable();
            $table->morphs('user');
            $table->foreignId('device_type_id')->nullable()->constrained('device_types');
            $table->integer('results_count')->nullable();
            $table->integer('solved_questions_count')->nullable();
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
        Schema::dropIfExists('search_queries');
    }
};
