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
        Schema::create('i_p_casesheets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->bigInteger('ip_no_id')->nullable()->default(0);
            $table->bigInteger('consultation_id')->nullable()->default(0);
            $table->string('morning_session', 100)->nullable()->default('0');
            $table->string('afternoon_session', 100)->nullable()->default('0');
            $table->bigInteger('mrng_staff_id')->nullable();
            $table->bigInteger('evng_staff_id')->nullable();
            $table->string('vital_dates', 500)->nullable();
            $table->string('ip_casesheet_bill_no');
            $table->decimal('treatment_cost',18,2)->default(0);
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
        Schema::dropIfExists('i_p_casesheets');
    }
};
