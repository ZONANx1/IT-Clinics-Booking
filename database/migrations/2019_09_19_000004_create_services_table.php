<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            
            $table->datetime('start_time');

            $table->datetime('finish_time');

            $table->string('name');

            $table->longText('Desc')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
