<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            // $table->string('product_id');
            $table->string('product_id', 32)->index();
            $table->string('product_name')->nullable();
            $table->string('description')->nullable();
            $table->string('manufacturer_id', 32)->references('manufacturer_id')->on('manufacturer')->nullable();
            $table->string('product_type_id', 32)->references('id')->on('product_type')->nullable();
            
            $table->decimal('landed_cost')->nullable();
            $table->decimal('selling_price')->nullable();
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
        Schema::dropIfExists('product');
    }
}
