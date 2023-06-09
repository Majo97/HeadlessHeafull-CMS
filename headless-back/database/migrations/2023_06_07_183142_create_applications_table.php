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
            $table->string('name', 48)->charset('utf8')->collation('utf8_unicode_ci')->regex('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]{1,48}$/');
            $table->string('last_name', 48)->charset('utf8')->collation('utf8_unicode_ci')->regex('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]{1,48}$/');
            $table->string('email');
            $table->string('cv')->file(['mimes:pdf,docx']);
            $table->boolean('privacy_consent');
            $table->timestamps();

            $table->foreign('position_id')->references('position_id')->on('job_positions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
