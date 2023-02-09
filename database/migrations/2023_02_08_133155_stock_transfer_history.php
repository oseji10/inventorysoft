<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockTransferHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('stock_transfer_history', function (Blueprint $table) {
            $table->id();
            // $table->string('stock_id');
            $table->string('stock_id', 32)->index();
            $table->string('initial_stock_id', 32)->references('stock_id')->on('stock');
            $table->string('sent_from', 32)->references('warehouse_id')->on('warehouse')->nullable();
            $table->string('sent_to', 32)->references('warehouse_id')->on('warehouse')->nullable();
            // $table->string('received_from', 32)->references('warehouse_id')->on('warehouse');
            $table->bigInteger('quantity_received')->nullable();
            $table->unsignedBigInteger('sent_by')->nullable()->nullable();
            $table->foreign('sent_by')->references('id')->on('user');
            $table->unsignedBigInteger('received_by')->nullable()->nullable();
            $table->foreign('received_by')->references('id')->on('user');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->string('status')->default('PENDING RECEIPT');
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
        Schema::dropIfExists('stock_history');
    }
}
