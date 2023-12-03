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
        Schema::create('roombooking', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('op_id')->nullable()->default(0);
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->bigInteger('RoomType_id')->nullable()->default(0);
            $table->bigInteger('Room_id')->nullable()->default(0);
            $table->boolean('acnonac')->nullable();
            $table->string('Rent')->nullable();
            $table->date('fromdate');
            $table->date('Todate');
            $table->string('remarks',90)->nullable();
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
        Schema::dropIfExists('roombooking');
    }
};
