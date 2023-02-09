<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('stock_id', 32)->index();
            $table->string('manufacturer_id', 32)->references('manufacturer_id')->on('manufacturer');
            
            $table->string('supplier_id', 32)->references('supplier_id')->on('supplier');
            $table->string('batch_number')->nullable();
            $table->string('invoice_number')->nullable();
            // $table->string('product_id')->nullable();
            $table->string('product_id', 32)->references('product_id')->on('product');
            // $table->bigInteger('warehouse_id')->nullable();
            $table->string('warehouse_id', 32)->references('warehouse_id')->on('warehouse');
            $table->bigInteger('quantity_received')->nullable();
            $table->bigInteger('quantity_sold')->nullable();
            $table->bigInteger('quantity_expired')->nullable();
            $table->bigInteger('quantity_transferred')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('user');
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
        Schema::dropIfExists('stock');
    }
}
