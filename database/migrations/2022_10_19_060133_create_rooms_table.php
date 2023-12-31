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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_no', 100)->nullable();
            $table->bigInteger('room_type_id')->nullable();
            $table->bigInteger('floor_id')->nullable();
            $table->decimal('rent_ac', 8)->nullable();
            $table->decimal('rent_non_ac', 8)->nullable();
            $table->boolean('is_maintenence')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
