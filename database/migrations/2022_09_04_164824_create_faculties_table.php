<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('fac_code', 50)->unique()->index();
//            $table->string('fac_name')->nullable();
            $table->string('fac_title');
            $table->string('fac_designtion');
            $table->date('fac_join');
            $table->date('fac_retirement');
            $table->string('fac_phone',12);
//            $table->string('fac_email');
            $table->string('fac_status');
            $table->longText('fac_description')->nullable();
//            $table->unsignedBigInteger('created_by');
//            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
