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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->nullable()->constrained('subject_masters');
            $table->foreignId('question_type_id')->nullable()->constrained('question_types');
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->morphs('user');
            $table->string('slug')->nullable();
            $table->boolean('status')->default(true);
            $table->nullableMorphs('user_updated_by');
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
        Schema::dropIfExists('questions');
    }
};
