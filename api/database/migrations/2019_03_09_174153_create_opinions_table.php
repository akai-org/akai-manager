<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('rating', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            $table->text('opinion');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('anonymous')->default(0);
            $table->string('object_type');
            $table->string('object_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
