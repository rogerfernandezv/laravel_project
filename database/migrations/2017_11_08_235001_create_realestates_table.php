<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('realestate_business_id');
            $table->unsignedInteger('realestate_type_id');
            $table->string('title');

            $table->string('cod_realestate');
            $table->string('address')->nullable();
            $table->string('cep')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->double('price');
            $table->double('surface')->default(0);

            $table->integer('bedroom')->default(0);
            $table->integer('suite')->default(0);
            $table->integer('bathroom')->default(0);
            $table->integer('livingroom')->default(0);
            $table->integer('garage')->default(0);
            $table->string('description')->default(0);

            $table->timestamps();

            $table->foreign('realestate_business_id')
                  ->references('id')->on('realestate_business')
                  ->onDelete('cascade');

            $table->foreign('realestate_type_id')
                  ->references('id')->on('realestate_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestates');
    }
}
