<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonAppointmentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('addon_appointment', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id', 'appointment_id_fk_9099449')->references('id')->on('appointments')->onDelete('cascade');
            $table->unsignedBigInteger('addon_id');
            $table->foreign('addon_id', 'addon_id_fk_9099449')->references('id')->on('addons')->onDelete('cascade');
        });
    }
}
