<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesreportsTable extends Migration
{
    public function up()
    {
        Schema::create('salesreports', function (Blueprint $table) {
            $table->id();
            $table->string('week');
            $table->integer('monday');
            $table->integer('tuesday');
            $table->integer('wednesday');
            $table->integer('thursday');
            $table->integer('friday');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salesreports');
    }
}

