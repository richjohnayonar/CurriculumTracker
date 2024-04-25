<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDostPasserNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dost_passer_names', function (Blueprint $table) {
        $table->id();
        $table->foreignId('academicTrack_id')->constrained('academic_tracks')->onDelete('cascade');
        $table->string('full_name')->nullable();
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
        Schema::dropIfExists('dost_passer_names');
    }
}
