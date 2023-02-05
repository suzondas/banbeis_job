<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperience12Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_12', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('job_id');
            $table->string('eiin');
            $table->string('institute_name');
            $table->string('district');
            $table->string('upazila');
            $table->string('subject');
            $table->string('bmed');
            $table->string('ict_training');
            $table->string('ict_diploma');
            $table->string('ict_graduate');
            $table->string('district_ambassador');
            $table->string('muktopath_content_developer');
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
        Schema::dropIfExists('experience_12');
    }
}
