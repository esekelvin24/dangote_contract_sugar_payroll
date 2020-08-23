<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name');
            $table->integer('role_enable');
            $table->timestamps();
        });

        DB::table('roles')
        ->insert(array(
            array('role_name'=>'Administration', 'role_enable'=>'1','created_at'=>NOW()),
            array('role_name'=>'Support', 'role_enable'=>'1','created_at'=>NOW()),
            array('role_name'=>'User', 'role_enable'=>'1','created_at'=>NOW()),
            
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
