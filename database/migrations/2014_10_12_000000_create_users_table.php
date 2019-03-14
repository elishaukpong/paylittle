<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('details')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('occupation')->nullable();
            $table->string('is_admin')->default(0);
            $table->integer('organization_id')->unsigned()->default(0);
            $table->integer('state_id')->unsigned()->default(0);
            $table->integer('localgovernmentarea_id')->unsigned()->default(0);
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
