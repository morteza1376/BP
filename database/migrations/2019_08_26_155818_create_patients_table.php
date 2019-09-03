<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('family');
            $table->string('phone_number')->unique();
            $table->string('national_code')->unique();
            $table->float('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('birth_year')->nullable();
            $table->boolean('gender');
            $table->boolean('is_smoker')->nullable();
            $table->float('smoke_time')->nullable();
            $table->tinyInteger('health_status')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
