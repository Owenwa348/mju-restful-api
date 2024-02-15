<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mju_students', function (Blueprint $table) {
            $table->string('student_code', 15)->primary();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('first_name_en', 50)->nullable();
            $table->string('last_name_en', 50)->nullable();
            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('major_id')->on('majors');
            $table->string('idcard', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('address', 500)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mju_students',function(Blueprint $table){
            $table->dropForeign(['major_id']);
        });
        Schema::dropIfExists('mju_students');
    }
};