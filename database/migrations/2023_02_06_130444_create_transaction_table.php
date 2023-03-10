<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            // $table->string('transaction_id');
            $table->string('transaction_id', 32)->index();
            $table->string('payment_mode')->nullable();
            $table->string('payment_status')->default('PENDING');
            $table->decimal('amount_payable')->nullable();
            $table->decimal('amount_paid')->nullable();
            $table->unsignedBigInteger('sold_by')->nullable();
            $table->foreign('sold_by')->references('id')->on('user');
            $table->unsignedBigInteger('bought_by')->nullable();
            $table->foreign('bought_by')->references('id')->on('user');
            $table->unsignedBigInteger('payment_confrimed_by')->nullable();
            $table->foreign('payment_confrimed_by')->references('id')->on('user');
            $table->bigInteger('payment_reference_number')->nullable();
            $table->string('warehouse_id', 32)->references('warehouse_id')->on('warehouse')->nullable();
            $table->timestamp('created_at');
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
        Schema::dropIfExists('transaction');
    }
}
