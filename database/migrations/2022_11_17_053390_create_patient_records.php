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
        Schema::create('patient_records', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('op_id');
            $table->bigInteger('doctor_id');
            $table->string('present_complaint');
            $table->string('history_of_present_complaint');
            $table->string('provisional_diagnosis');
            $table->string('past_history');
            $table->string('family_history');
            $table->string('personal_history');
            $table->boolean('consultation_status')->default(false);
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
        Schema::dropIfExists('consultations');
    }
};
