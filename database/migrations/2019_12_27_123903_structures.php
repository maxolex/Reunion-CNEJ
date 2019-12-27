<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Structures.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:39:03pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Structures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('structures',function (Blueprint $table){

        $table->increments('id');
        
        
        $table->String('nom')->nullable();
        
        
        
        $table->longText('description')->nullable();
        
        
        
        $table->String('telephone')->nullable();
        
        
        
        $table->String('email')->nullable();
        
        
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
        Schema::drop('structures');
    }
}
