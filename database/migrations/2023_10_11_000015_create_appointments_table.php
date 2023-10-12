<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('time');
            $table->string('status')->nullable();
            $table->longText('comment')->nullable();
            $table->string('size');
            $table->decimal('price', 15, 2);
            $table->string('additional_info')->nullable();
            $table->boolean('reminded')->default(0)->nullable();
            $table->boolean('is_counted_as_loyalty')->default(0)->nullable();
            $table->boolean('is_it_loyalty_appoint')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
