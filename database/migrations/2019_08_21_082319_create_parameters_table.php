<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter', function (Blueprint $table) {
            $table->string('parameter_name');
            $table->string('parameter_value');
            $table->text('parameter_description')->default("");
            $table->timestamps();
        });
        
        DB::table('parameter')
        ->insert(array(
            array('parameter_name'=>'server', 'parameter_value'=>'127.0.0.1','parameter_description'=>'Server IP','created_at'=>NOW()),
            array('parameter_name'=>'staff_image_path', 'parameter_value'=>'/dorc/public/user_img','parameter_description'=>'Path to where user images are stored','created_at'=>NOW()),
            array('parameter_name'=>'transfer_protocol', 'parameter_value'=>'http','parameter_description'=>'Transfer protocol of the image url','created_at'=>NOW()),
        ));

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameter');
    }
}
