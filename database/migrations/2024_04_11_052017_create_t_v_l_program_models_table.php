<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVLProgramModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_v_l_program_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->date('school_year_start')->nullable();
            $table->date('school_year_end')->nullable();
            $table->string('grade_lvl')->nullable();
            $table->string('specialization')->nullable();
            $table->string('total_male_enrolled')->nullable();
            $table->string('total_female_enrolled')->nullable();
            $table->string('overall_enrolled')->nullable();
            $table->string('total_graduates')->nullable();
            $table->string('total_student_pursuing_college')->nullable();
            $table->string('total_student_seeking_job')->nullable();
            $table->string('total_student_doing_business')->nullable();
            $table->string('undecided_student_total')->nullable();
            $table->string('total_NC_passer')->nullable();
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
        Schema::dropIfExists('t_v_l_program_models');
    }
}
