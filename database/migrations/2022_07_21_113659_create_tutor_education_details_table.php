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
        Schema::create('tutor_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->constrained('tutors');
            $table->string('degree1')->nullable();
            $table->string('college1')->nullable();
            $table->year('year1')->nullable();
            $table->string('degree_file_url1')->nullable();
            $table->string('degree2')->nullable();
            $table->string('college2')->nullable();
            $table->year('year2')->nullable();
            $table->string('degree_file_url2')->nullable();
            $table->json('subjects')->nullable();
            $table->foreignId('verification_status_id')->nullable()->constrained('tutor_verification_statuses');
            $table->foreignId('status_changed_by_id')->nullable()->constrained('admins');
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
        Schema::dropIfExists('tutor_education_details');
    }
};
