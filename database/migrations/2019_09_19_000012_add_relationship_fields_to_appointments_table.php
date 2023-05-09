<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'client_fk_360714')->references('id')->on('users');

            $table->unsignedInteger('employee_id')->nullable();

            $table->foreign('employee_id', 'employee_fk_360715')->references('id')->on('employees');
        });
    }
}
