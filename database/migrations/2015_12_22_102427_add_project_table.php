<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->integer('progress');
            $table->integer('status');
            $table->date('due_date');
           $table->timestamps();
        });

        Schema::table('projects', function($table) {
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
