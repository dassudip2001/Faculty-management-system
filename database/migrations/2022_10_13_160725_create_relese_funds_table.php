<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleseFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relese_funds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('transaction_no');
            $table->string('payment_method');
            $table->date('transtation_date');
            $table->string('payment_method_no');
            $table->bigInteger('relese_funds_amount');
            $table->unsignedBigInteger('projec_fund_relese_id');

            // $table->string('trans_no');

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
        Schema::dropIfExists('relese_funds');
    }
}
