<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('dob',255);
            $table->bigInteger('department_id');
            $table->string('position',255);
            $table->string('type_of_employee',255);
            $table->bigInteger('number_of_hours')->nullable();
            $table->bigInteger('amount_per_hour')->nullable();
            $table->bigInteger('monthly_rate')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
