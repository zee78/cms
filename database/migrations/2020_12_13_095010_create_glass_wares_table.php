<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassWaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glass_wares', function (Blueprint $table) {
            $table->id();
            $table->string('glassware_name');
            $table->string('stock_in_hand');
            $table->string('breakge');
            $table->string('responsible_person');
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
        Schema::dropIfExists('glass_wares');
    }
}
