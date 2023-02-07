<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('email_verified_at')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('role');
            $table->string('warehouse_id')->nullable();
            // $table->foreign('warehouse_id')->references('warehouse_id')->on('warehouse');
            $table->string('status')->default('ACTIVE');
            $table->bigInteger('added_by')->nullable();
            $table->timestamp('created_At');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
