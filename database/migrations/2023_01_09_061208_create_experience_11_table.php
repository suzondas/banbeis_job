<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperience11Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('job_id');
            $table->integer('e_m_s_s');
            $table->integer('b_p_s');
            $table->integer('p_p_s');
            $table->integer('c_s');
            $table->integer('t_a_s');
            $table->integer('t_s');

            $table->integer('e_m_s_s_experience')->nullable();
            $table->integer('b_p_s_experience')->nullable();
            $table->integer('p_p_s_experience')->nullable();
            $table->integer('c_s_experience')->nullable();
            $table->integer('t_a_s_experience')->nullable();
            $table->integer('t_s_experience')->nullable();

            $table->string('e_m_s_s_path')->nullable();
            $table->string('b_p_s_path')->nullable();
            $table->string('p_p_s_path')->nullable();
            $table->string('c_s_path')->nullable();
            $table->string('t_a_s_path')->nullable();
            $table->string('t_s_path')->nullable();

            $table->string('other_survey')->nullable();
            $table->string('other_survey_path')->nullable();

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
        Schema::dropIfExists('experiences');
    }
}
