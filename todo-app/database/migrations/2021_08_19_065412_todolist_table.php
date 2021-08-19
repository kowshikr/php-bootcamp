<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodolistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolist',function (Blueprint $table){
            $table->id();
            $table->foreignId("users_id");
            $table->string('task_name');
            $table->enum('status',["PENDING","IN_PROGRESS","DONE"]);
            $table->timestamps();
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todolist');
    }
}
