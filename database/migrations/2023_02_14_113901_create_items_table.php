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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('item_category')->nullable();
            $table->string('name', 100)->nullable();
            $table->bigInteger('unit')->nullable();
            $table->decimal('selling_price', 8)->nullable();
            $table->decimal('mrp', 8)->nullable();
            $table->decimal('gst', 8)->nullable();
            $table->bigInteger('batch_no')->nullable();
            $table->timestamp('exp_date')->nullable();
            $table->decimal('opening_stock', 8)->nullable();
            $table->bigInteger('reorder_level')->nullable();
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
        Schema::dropIfExists('items');
    }
};
