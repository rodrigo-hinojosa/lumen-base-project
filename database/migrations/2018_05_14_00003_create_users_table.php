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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->smallInteger('user_type_id')->unsigned();
            $table->smallInteger('user_state_id')->unsigned();
            $table->string('name', 100);
            $table->string('lastname', 50)->nullable();
            $table->string('email', 100);
            $table->string('username', 50);
            $table->string('password', 60);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['email', 'deleted_at']);
            $table->unique(['username', 'deleted_at']);
        });

        Schema::table('users', function ($table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->foreign('user_state_id')->references('id')->on('user_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
