<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->Integer('vendor_id');
            $table->string('order_type');
            $table->string('order_placed_by');
            $table->string('order_date');
            $table->string('cost');
            $table->Integer('user_id')->nullable()->comment = "approve_by";
            $table->string('order_procurement_by');
            $table->string('order_receiving_date');
            $table->string('order_status');
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
        Schema::dropIfExists('orders');
    }
}
