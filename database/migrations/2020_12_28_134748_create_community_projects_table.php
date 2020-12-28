<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_projects', function (Blueprint $table) {
            $table->id();
             $table->string('project_id');
            $table->string('project_name');
            $table->string('team_lead');
            $table->string('team_members');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('monthly_progress');
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
        Schema::dropIfExists('community_projects');
    }
}
