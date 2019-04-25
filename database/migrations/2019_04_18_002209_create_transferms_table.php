<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetransfermsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferm', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('Description');
            $table->string('State');
            $table->integer('idMovementType', false);
            $table->integer('idUserReceives', false);
            $table->integer('idUserSends', false);
            $table->integer('idBranchReceives', false);
            $table->integer('idBranchSends', false);
            $table->integer('idTransport', false);
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
        Schema::drop('transferms');
    }
}
