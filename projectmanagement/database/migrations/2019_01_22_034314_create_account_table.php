<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Accounts', function (Blueprint $table) {
            $table->increments('account_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('UserTypes');
            $table->unsignedInteger('account_info_id');
            $table->foreign('account_info_id')->references('account_info_id')->on('AccountInfos');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
