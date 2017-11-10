<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileRealestateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_realestate', function (Blueprint $table) {
            //$table->increments('id');
            $table->unsignedInteger('realestate_id');
            $table->unsignedInteger('file_id');

            $table->foreign('realestate_id')
                  ->references('id')->on('realestates')
                  ->onDelete('cascade');

            $table->foreign('file_id')
                  ->references('id')->on('files')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('file_realestate');
    }
}
