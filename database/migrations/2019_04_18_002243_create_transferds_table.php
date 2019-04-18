<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetransferdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferd', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('Quantity');
            $table->string('State');
            $table->integer('idTransferM', false);
            $table->integer('idBox', false);
            $table->integer('idProduct', false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transferds');
    }
}
