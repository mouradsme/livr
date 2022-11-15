<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddedAndPhoneToFactoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('factory', function (Blueprint $table) {
            //

            $table->string('phone');
            $table->integer('added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factory', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('added');
        });
    }
}
