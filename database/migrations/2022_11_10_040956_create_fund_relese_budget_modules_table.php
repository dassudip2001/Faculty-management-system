<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundReleseBudgetModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_relese_budget_modules', function (Blueprint $table) {
//            $table->id();
            $table->unsignedBigInteger('relese_fund_id');
            $table->unsignedBigInteger('relese_fund_budget_id');
            $table->bigInteger('fund_relese_budget_amount');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fund_relese_budget_modules');
    }
}
