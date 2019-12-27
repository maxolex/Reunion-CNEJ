<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Poles.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:48:36pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Poles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('poles',function (Blueprint $table){

        $table->increments('id');
        
        
        $table->String('libelle')->nullable();
        
        
        
        $table->String('commentaire')->nullable();
        
        
        /**
         * Foreignkeys section
         */
        
        
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
        Schema::drop('poles');
    }
}
