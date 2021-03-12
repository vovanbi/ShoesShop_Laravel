<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumCHomeInTableCategories extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('c_home')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('c_home');
        });
    }
}
