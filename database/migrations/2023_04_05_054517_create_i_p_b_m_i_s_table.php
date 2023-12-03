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
        Schema::create('i_p_b_m_i_s', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->bigInteger('ip_no_id')->nullable()->default(0);
            $table->bigInteger('consultation_id')->nullable()->default(0);
            $table->float('temp_mrng', 6, 2)->nullable();
            $table->float('temp_evng', 6, 2)->nullable();
            $table->string('b_P_mrng', 30)->nullable();
            $table->string('b_P_evng', 30)->nullable();
            $table->string('weight', 30)->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('i_p_b_m_i_s');
    }
};
