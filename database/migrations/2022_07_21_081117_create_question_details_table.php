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
        Schema::create('question_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->nullable()->constrained('questions');
            $table->foreignId('source_type_id')->nullable()->constrained('source_types');
            $table->foreignId('device_type_id')->nullable()->constrained('device_types');
            $table->foreignId('redirection_reason_id')->nullable()->constrained('redirection_reasons');
            $table->boolean('isQCDone')->default(true);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('question_details');
    }
};
