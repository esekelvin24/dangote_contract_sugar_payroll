<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('othername')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile_phone')->nullable();
            $table->char('passchg_logon',1)->nullable();
            $table->char('pass_expire',1)->nullable();
            $table->datetime('pass_dateexpire')->nullable();
            $table->char('user_disabled',1)->nullable();
            $table->char('user_locked',1)->nullable();
            $table->char('day_1',1)->nullable();
            $table->char('day_2',1)->nullable();
            $table->char('day_3',1)->nullable();
            $table->char('day_4',1)->nullable();
            $table->char('day_5',1)->nullable();
            $table->char('day_6',1)->nullable();
            $table->char('day_7',1)->nullable();
            $table->char('override_wh',1)->nullable();
            $table->char('pin_missed',1)->nullable();
            $table->datetime('modified')->nullable();
            $table->longText('hint_question')->nullable();
            $table->longText('hint_answer')->nullable();
            $table->string('created_by',250)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
