<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('als', function (Blueprint $table) {
            $table->id();
            $table->string('school_lvl')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('school_year_start')->nullable();
            $table->date('school_year_end')->nullable();
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
        Schema::dropIfExists('als');
    }
}
