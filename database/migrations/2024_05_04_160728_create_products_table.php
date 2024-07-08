<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_category_id");
            $table->string("name");
            $table->float("price");
            $table->integer("stock");
            $table->integer("sold");
            $table->string("varian");
            $table->string("size");
            $table->longText("description");
            $table->longText("image_url");
            $table->double("total_rating", 8, 2)->nullable();
            $table->foreign("product_category_id")->references("id")->on("product_categories")->onDelete('cascade')
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
        Schema::dropIfExists('products');
    }
}
