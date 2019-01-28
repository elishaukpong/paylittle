<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountAndReturnsColumnToProjectSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_subscriptions', function (Blueprint $table) {
            $table->integer('amount')->unsigned();
            $table->integer('returns')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_subscriptions', function (Blueprint $table) {
            $table->dropColumn('amount');
            $table->dropColumn('returns');
        });
    }
}
