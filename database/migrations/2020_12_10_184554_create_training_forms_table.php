<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('date');
            $table->string('speaker');
            $table->string('participant_numbers');
            $table->string('total_amount_received');
            $table->string('total_amount_spent');
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
        Schema::dropIfExists('training_forms');
    }
}
