<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Personnels.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:47:30pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class Personnels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('personnels',function (Blueprint $table){

        $table->increments('id');
        
        
        $table->String('nom')->nullable();
        
        
        
        $table->String('prenom')->nullable();
        
        
        
        $table->String('sexe')->nullable();
        
        
        
        $table->String('telephone')->nullable();
        
        
        
        $table->String('email')->nullable();
        
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('structure_id')->unsigned()->nullable();
        $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
        
        
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
        Schema::drop('personnels');
    }
}
