<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Personnel_cnejs.
 *
 * @author  The scaffold-interface created at 2019-12-27 12:47:57pm
 * @link  https://github.com/maxolex/scaffold-interface
 */
class PersonnelCnejs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('personnel_cnejs',function (Blueprint $table){

        $table->increments('id');
        
        
        $table->String('nom')->nullable();
        
        
        
        $table->String('prenom')->nullable();
        
        
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
        Schema::drop('personnel_cnejs');
    }
}
