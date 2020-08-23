<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menu_category_header', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('menu_category_header')
        ->insert(array(
            array('id'=>'001', 'name'=>'Administration','created_at'=>NOW()),
            array('id'=>'002', 'name'=>'Report','created_at'=>NOW()),

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('menu_category_header');
    }
}
