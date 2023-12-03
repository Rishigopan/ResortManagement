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
        Schema::create('diet_charts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('op_no_id')->nullable()->default(0);
            $table->bigInteger('consultation_id')->nullable()->default(0);
            $table->date('date');
            $table->time("time");
            $table->string('diet_id');
            $table->decimal('diet_cost',18,2)->default(0);
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
        Schema::dropIfExists('diet_charts');
    }
};
