<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_subscriptions', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('user_id', 36);
            $table->string('project_id', 36);
            $table->integer('status_id')->default(1);

            $table->timestamps();

            $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_subscriptions');
    }
}
