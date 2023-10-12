<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('package_service', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id', 'package_id_fk_9099420')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_9099420')->references('id')->on('services')->onDelete('cascade');
        });
    }
}
