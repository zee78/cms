<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costings', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('ingredient_name');
            $table->string('quantity_used');
            $table->string('container_name');
            $table->string('container_cost');
            $table->string('sticker_cost');
            $table->string('box_cost');
            $table->string('bag_cost');
            $table->string('total_direct_cost');
            $table->string('gst');
            $table->string('marketing_cost');
            $table->string('profit_percentage');
            $table->string('profit_amount');
            $table->string('market_retail_price');
            $table->enum('status',['0' , '1']);
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
        Schema::dropIfExists('costings');
    }
}
