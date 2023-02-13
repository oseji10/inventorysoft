<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('temp_transaction', function (Blueprint $table) {
            $table->id();
            // $table->string('transaction_id');
            // $table->string('transaction_id', 32)->index();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->string('warehouse_id', 32)->references('warehouse_id')->on('warehouse')->nullable();
            // $table->string('stock_id', 32)->references('stock_id')->on('stock')->nullable();
            $table->string('product_id', 32)->references('product_id')->on('product')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit_cost')->nullable();
        
            $table->unsignedBigInteger('initiated_by')->nullable();
            $table->foreign('initiated_by')->references('id')->on('user');
           
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
        Schema::dropIfExists('transaction');
    }
}
