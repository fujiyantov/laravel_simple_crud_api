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
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('phone_number');
            $table->string('email');
            $table->unsignedInteger('province_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('ktp_number');
            $table->string('ktp_file')->nullable();
            $table->unsignedInteger('position_id')->nullable();
            $table->unsignedInteger('bank_id')->nullable();
            $table->string('account_number')->nullable();
            $table->timestamps();


            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('bank_id')->references('id')->on('banks');
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
