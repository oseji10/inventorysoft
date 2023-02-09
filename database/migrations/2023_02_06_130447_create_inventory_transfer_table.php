<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('inventory_transfer', function (Blueprint $table) {
            $table->id();
            // $table->string('stock_id');
            $table->string('stock_id', 32)->references('stock_id')->on('stock');
            $table->bigInteger('quantity_transferred')->nullable();
            $table->bigInteger('quantity_received')->nullable();
            $table->bigInteger('warehouse_transferred_from')->nullable();
            $table->bigInteger('warehouse_transferred_to')->nullable();
            $table->decimal('cost_per_unit')->nullable();
            $table->unsignedBigInteger('sent_by')->nullable();
            $table->foreign('sent_by')->references('id')->on('user');
            $table->unsignedBigInteger('received_by')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('inventory_transfer');
    }
}
