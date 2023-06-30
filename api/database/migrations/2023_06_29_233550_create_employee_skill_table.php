<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_skill', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('skill_id');

            $table->integer('score');

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('skill_id')->references('id')->on('skills');

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
        Schema::dropIfExists('employee_skill');
    }
}
