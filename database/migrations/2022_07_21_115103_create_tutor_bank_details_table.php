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
        Schema::create('tutor_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->constrained('tutors');
            $table->string('ac_name')->nullable();
            $table->string('ac_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('pan')->nullable();
            $table->string('pan_file')->nullable();
            $table->string('cheque_file')->nullable();
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
        Schema::dropIfExists('tutor_bank_details');
    }
};
