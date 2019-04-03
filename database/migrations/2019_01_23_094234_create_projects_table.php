<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('user_id');
            $table->string('duration_id');
            $table->string('repayment_id');
            $table->string('guarantor_id');
            $table->string('status_id')->default(1);

            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('amount')->unsigned();
            $table->text('details');
            $table->string('location');
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
}
