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
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consultation_no');
            $table->string('consultation_bill_no');
            $table->date('consultation_date');
            $table->bigInteger('op_id');
            $table->bigInteger('doctor_id');
            $table->integer('token_no');
            $table->decimal('registration_fees', 8,2)->default(0)->nullable();
            $table->decimal('consultation_fees', 8,2)->default(0)->nullable();
            $table->decimal('total', 8,2)->default(0)->nullable();
            $table->boolean('consultation_status')->default(false);
            $table->bigInteger('mode_of_payment_id');
            $table->bigInteger('branch_id')->nullable()->default(0);
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
