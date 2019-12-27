<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Thematiques.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:49:34pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Thematiques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('thematiques',function (Blueprint $table){

        $table->increments('id');
        
        
        $table->String('libelle')->nullable();
        
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('pole_id')->unsigned()->nullable();
        $table->foreign('pole_id')->references('id')->on('poles')->onDelete('cascade');
        
        
        $table->timestamps();
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('thematiques');
    }
}
