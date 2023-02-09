<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('expiries', function (Blueprint $table) {
            $table->id();
            // $table->string('stock_id');
            $table->string('stock_id', 32)->references('stock_id')->on('stock');
            $table->timestamp('expiry_date')->nullable();
            $table->bigInteger('quantity')->nullable();
            // $table->string('warehouse_id')->nullable();
            $table->string('warehouse_id')->references('warehouse_id')->on('warehouse');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('user');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('expiries');
    }
}
