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
        Schema::create('ops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no', 50);
            $table->string('op_no', 25);
            $table->date('op_date')->useCurrent();
            $table->string('name', 50);
            $table->integer('age');
            $table->boolean('gender')->default(false);
            $table->string('email', 50)->nullable();
            $table->string('full_address', 500)->nullable();
            $table->string('phone_no',15)->nullable();
            $table->string('mobile_no', 15);
            $table->string('occupation', 50)->nullable();
            $table->boolean('marital_status')->default(false);
            $table->string('local_address', 500)->nullable();
            $table->string('local_phone_no')->nullable();
            $table->string('local_mobile_no',15)->nullable();
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
        Schema::dropIfExists('ops');
    }
};
