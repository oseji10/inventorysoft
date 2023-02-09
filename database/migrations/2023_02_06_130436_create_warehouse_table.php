<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            // $table->string('warehouse_id');
            $table->string('warehouse_id', 32)->index();
            $table->string('warehouse_name')->nullable();
            $table->string('warehouse_address')->nullable();
            $table->string('warehouse_phone')->nullable();
            $table->string('warehouse_email')->nullable();
            $table->string('warehouse_state')->nullable();
            $table->bigInteger('warehouse_manager')->nullable();
            $table->string('warehouse_short_name')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('user');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->string('status')->default('ACTIVE');
        });

        // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse');
    }
}
