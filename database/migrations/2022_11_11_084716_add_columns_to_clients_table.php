<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('fullname');
            $table->string('code');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('others')->nullable();
            $table->string('added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
            $table->dropColumn('fullname');
            $table->dropColumn('code');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('others');
            $table->dropColumn('added');
        });
    }
}
