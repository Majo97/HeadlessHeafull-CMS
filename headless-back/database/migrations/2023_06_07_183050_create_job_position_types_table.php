<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPositionTypesTable extends Migration
{
    public function up()
    {
        Schema::create('job_position_types', function (Blueprint $table) {
            $table->id('type_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_position_types');
    }
}
