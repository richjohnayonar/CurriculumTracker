<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPEDProgramModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_p_e_d_program_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('school_year_start')->nullable();
            $table->date('school_year_end')->nullable();
            $table->string('type_of_learners')->nullable();
            $table->string('grade_lvl')->nullable();
            $table->string('no_enrolled_male_stud')->nullable();
            $table->string('no_enrolled_female_stud')->nullable();
            $table->string('overall_enrolled')->nullable();
            $table->string('pisay_passers')->nullable();
            $table->string('ste_passers')->nullable();
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
        Schema::dropIfExists('s_p_e_d_program_models');
    }
}
