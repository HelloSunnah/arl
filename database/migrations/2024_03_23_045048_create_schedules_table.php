<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('hr_id')->nullable();
            $table->string('hr_name')->nullable();
            $table->string('candidate_name')->nullable();
            $table->string('candidate_email')->nullable();
            $table->string('candidate_phone')->nullable();
            $table->string('candidate_country')->nullable();
            $table->string('candidate_time')->nullable();
            $table->string('status')->default(0);
            $table->string('schedule_date')->nullable();
            $table->string('schedule_start')->nullable();
            $table->string('schedule_end')->nullable();
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
        Schema::dropIfExists('schedules');
    }
};
