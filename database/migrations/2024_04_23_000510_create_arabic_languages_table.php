<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arabic_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');  
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('school_year_start')->nullable();
            $table->date('school_year_end')->nullable();
            $table->string('grade_lvl')->nullable();
            $table->string('no_enrolled_male_stud')->nullable();
            $table->string('no_enrolled_female_stud')->nullable();
            $table->string('overall_enrolled')->nullable();
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
        Schema::dropIfExists('arabic_languages');
    }
}
