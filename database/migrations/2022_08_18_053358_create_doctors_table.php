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
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('department_id')->nullable()->default(0);
            $table->bigInteger('branch_id')->nullable()->default(0);
            $table->boolean('gender')->default(false);
            $table->string('email')->unique();
            $table->string('password',255);
            $table->string('confirm_password',255);
            $table->string('mobile_no');
            $table->string('remarks')->nullable()->default("");
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
        Schema::dropIfExists('doctors');
    }
};
