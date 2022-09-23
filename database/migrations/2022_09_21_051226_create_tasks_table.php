<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
 
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->enum('status',['Not Started','In progress','Completed']);
            $table->enum('type',['Bug','Failure','Testing']);
            $table->string('created_by');
            $table->unsignedBigInteger('project_id'); 
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');



 



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
        Schema::dropIfExists('tasks');
    }
}
