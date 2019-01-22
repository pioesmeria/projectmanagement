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
        Schema::create('Projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('account_id')->on('Accounts');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')->references('team_id')->on('Teams');
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
