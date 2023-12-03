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
        Schema::create('doctor_consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('doctor_id')->nullable()->default(0);
            $table->decimal('op_consultation_fees', 8,2)->default(0)->nullable();
            $table->decimal('ip_consultation_fees', 8,2)->default(0)->nullable();
            $table->bigInteger('op_no_fee_days')->nullable()->default(0);
            $table->bigInteger('ip_no_fee_days')->nullable()->default(0);
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
        Schema::dropIfExists('doctor_consultations');
    }
};
