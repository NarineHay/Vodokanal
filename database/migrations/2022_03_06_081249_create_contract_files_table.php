<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_files', function (Blueprint $table) {
            $table->id()->from(100000);
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('file_name');
            $table->string('file_path');
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
        Schema::dropIfExists('contract_files');
    }
}
