<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('ssc');
            $table->string('hsc');
            $table->string('degree');
            $table->string('honors');
            $table->string('masters');

            $table->string('ssc_path')->nullable();
            $table->string('hsc_path')->nullable();
            $table->string('degree_path')->nullable();
            $table->string('honors_path')->nullable();
            $table->string('masters_path')->nullable();

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
        Schema::dropIfExists('educations');
    }
}
