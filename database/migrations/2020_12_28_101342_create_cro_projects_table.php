<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCroProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cro_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->Integer('funder_id');
            $table->string('project_type');
            $table->string('title');
            $table->string('funder_type');
            $table->Integer('amount');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('team_lead');
            $table->string('team_members');
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
        Schema::dropIfExists('cro_projects');
    }
}
