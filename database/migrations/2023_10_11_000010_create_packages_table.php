<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('low_price', 15, 2);
            $table->decimal('mid_price', 15, 2);
            $table->decimal('high_price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
