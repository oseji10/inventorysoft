<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            // $table->string('transaction_id');
            // $table->string('stock_id')->nullable();
            // $table->string('product_id')->nullable();
            // $table->string('manufacturer_id')->nullable();
            // $table->string('supplier_id')->nullable();
            // $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('transaction_id', 32)->references('transaction_id')->on('transaction')->nullable();
            // $table->string('transaction_id')->references('transaction_id')->on('transaction');
            $table->string('stock_id', 32)->references('stock_id')->on('stock')->nullable();
            $table->string('product_id', 32)->references('product_id')->on('product')->nullable();
            $table->string('manufacturer_id', 32)->references('manufacturer_id')->on('manufacturer')->nullable();
            $table->string('supplier_id', 32)->references('supplier_id')->on('supplier')->nullable();
            $table->bigInteger('quantity_sold')->nullable();
            $table->decimal('unit_cost')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->string('payment_status')->default("PENDING");
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('sale');
    }
}
