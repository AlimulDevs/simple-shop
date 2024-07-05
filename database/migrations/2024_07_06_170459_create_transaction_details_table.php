<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("customer_id");
            $table->float("total_price");
            $table->integer("total_qty");
            $table->string("size");
            $table->string("varian");
            $table->string("status");
            $table->string("payment_method");
            $table->string("delivery");
            $table->float("tax");
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("product_id")->references("id")->on("products")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
