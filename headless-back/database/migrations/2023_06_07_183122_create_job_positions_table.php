<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPositionsTable extends Migration
{
    public function up()
    {
        Schema::create('job_positions', function (Blueprint $table) {
            $table->id('position_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('address');
            $table->text('description');
            $table->text('requirements');
            $table->text('responsibilities');
            $table->timestamp('expiration_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

   
            $table->softDeletes();

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
       
            $table->foreign('type_id')->references('type_id')->on('job_position_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_positions');
        
    }
    
}
