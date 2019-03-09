<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('repo_link')->nullable();

            // "at" - timestampy określające konkretne wydarzenie, które miało miejsce
            // "until" - timestampy określające planowaną datę wydarzenia
            $table->timestamp('started_at')->nullable();
            $table->timestamp('started_until')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('suspended_until')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('finished_unitl')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
