<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProjectNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            
            $table->string('title');
            $table->text('note');
            
            $table->timestamps();
        });

        Schema::table('project_notes', function($table) {
            $table->foreign('project_id')->references('id')->on('projects');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_notes');
    }
}
