<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_statuses', function (Blueprint $table) {
           $table->id();
            $table->string('product_name');
            $table->string('date');
            $table->string('packs_sold');
            $table->string('packs_in_hand');
            $table->string('amount_received');
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
        Schema::dropIfExists('sold_statuses');
    }
}
