<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');

          //  $table->datetime('start_time')->nullable();

          //  $table->datetime('finish_time')->nullable();

            $table->longText('comments')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
