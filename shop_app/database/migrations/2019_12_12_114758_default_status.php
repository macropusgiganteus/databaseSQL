<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefaultStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // !!!!! RUN THIS CODE BEFORE MIGRATE ---> composer require doctrine/dbal  <--- !!!!
        
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->default('In process')->change();
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
    }
}
