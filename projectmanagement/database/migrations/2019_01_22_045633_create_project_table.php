<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('project_id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('account_id')->on('account');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('team_id')->on('team');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->date('deadline');
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
        Schema::dropIfExists('project');
    }
}
