<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('menu_id');
            $table->string('menu_name');
            $table->string('menu_url');
            $table->string('parent_id');
            $table->string('sub_menu');
            $table->string('menu_level');
            $table->string('menu_order');
            $table->string('menu_layout_position')->default("");
            $table->string('category_header')->default("");
            $table->string('icon_class')->default("");
            $table->timestamps();
        });

        DB::table('menu')
        ->insert(array(
            array('menu_name'=>'Administration', 'menu_url'=>'/administration','parent_id'=>'','menu_level'=>'0','sub_menu'=>'true','menu_order'=>'0','created_at'=>NOW()),
            array('menu_name'=>'View', 'menu_url'=>'/view','parent_id'=>'','menu_level'=>'0','menu_order'=>'0','sub_menu'=>'true','created_at'=>NOW()),
            array('menu_name'=>'User List', 'menu_url'=>'/user-list','parent_id'=>'2','menu_level'=>'','menu_order'=>'1','sub_menu'=>'false','created_at'=>NOW()),
            array('menu_name'=>'Menu List', 'menu_url'=>'/menu-list','parent_id'=>'1','menu_level'=>'','menu_order'=>'1','sub_menu'=>'false','created_at'=>NOW()),
            array('menu_name'=>'Change Password', 'menu_url'=>'/change_password','parent_id'=>'1','menu_level'=>'','menu_order'=>'1','sub_menu'=>'false','created_at'=>NOW()),
            array('menu_name'=>'Step 2', 'menu_url'=>'#','parent_id'=>'2','menu_level'=>'','menu_order'=>'1','sub_menu'=>'true','created_at'=>NOW()),
            array('menu_name'=>'Step 3', 'menu_url'=>'/ese-check','parent_id'=>'6','menu_level'=>'','menu_order'=>'1','sub_menu'=>'true','created_at'=>NOW()),
          
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
