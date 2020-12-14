<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemicals', function (Blueprint $table) {
             $table->id();
            $table->string('chemical_name');
            $table->string('stock_in_hand');
            $table->string('unit_cost');
            $table->string('quantity_used');
            $table->string('usage_detail');
            $table->string('quantity_remaining');
            $table->string('stock_level');
            $table->string('cost_chemicals_used');
            $table->string('wastage_amount');
            $table->string('wastage_cost');

            $table->enum('status',['0' , '1']);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('chemicals');
    }
}
