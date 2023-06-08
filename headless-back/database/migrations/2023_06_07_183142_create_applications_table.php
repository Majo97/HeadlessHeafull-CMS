<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->unsignedBigInteger('position_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('cv');
            $table->boolean('privacy_consent');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('position_id')->references('position_id')->on('job_positions')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
