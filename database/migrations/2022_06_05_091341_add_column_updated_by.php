<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUpdatedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function(Blueprint $table){
            $table->integer('updated_by')->nullable();
        });

        Schema::table('posts', function(Blueprint $table){
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('updated_by');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('updated_by');
        });
    }
}
