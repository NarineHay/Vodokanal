<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_jobs', function (Blueprint $table) {
            $table->id()->from(100000);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('tarif_id')->unsigned();
            $table->foreign('tarif_id')->references('id')->on('tarifs');
            $table->bigInteger('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('cards');
            $table->string('price')->nullable();
            $table->string('status');
            $table->string('date_start')->timestamps();
            $table->string('date_end')->timestamps()->nullable();
            $table->string('amount')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_jobs');
    }
}
