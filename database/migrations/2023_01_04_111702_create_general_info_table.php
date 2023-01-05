<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->enum('gender',['male','female'])->default('male');
            $table->date('dob');
//            $table->string('nationality');
            $table->string('nid');
            $table->string('birth_reg_num');
            $table->enum('nid_or_birth_reg_num',['1','2'])->default('1');
            $table->string('email');
            $table->string('contact_num');
            $table->string('is_contact_num_whatsapp');

            $table->string('care_of');
            $table->string('village');
            $table->string('district');
            $table->string('upazila');
            $table->string('post_office');
            $table->string('post_code');

            $table->string('ma_care_of');
            $table->string('ma_village');
            $table->string('ma_district');
            $table->string('ma_upazila');
            $table->string('ma_post_office');
            $table->string('ma_post_code');

            $table->enum('is_pa_ma',['1','2'])->default('1');

            $table->string('student_id_path');

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
        Schema::dropIfExists('general_info');
    }
}
