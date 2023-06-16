<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMembersTable extends Migration
{
    public function up()
    {
        Schema::create('company_members', function (Blueprint $table) {
            $table->id('member_id');
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('created_by');
            $table->enum('status', ['active', 'inactive'])->default('active');
            
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_members');
    }
}
