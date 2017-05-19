<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_talents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('talent_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->addColumn('tinyInteger','status',['length'=>1,'default'=>2]);
            $table->integer('level');
            $table->date('from_when');
            $table->text('description');
            $table->foreign('talent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        //
    }
}
