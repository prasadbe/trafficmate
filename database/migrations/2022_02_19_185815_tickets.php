<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tickets', function($model) {
            $model->increments('id');
            $model->string('name', 100);
            $model->text('description');
            $model->dateTime('show_date_time');
            $model->dateTime('booking_start_date');
            $model->dateTime('booking_closing_date');
            $model->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
