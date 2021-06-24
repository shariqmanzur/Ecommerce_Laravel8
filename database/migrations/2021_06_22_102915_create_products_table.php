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
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_image');
            $table->integer('brand_id');
            $table->string('product_model');
            $table->longtext('product_shortdesc');
            $table->longtext('product_desc');
            $table->longtext('product_keywords');
            $table->longtext('product_technical_spec');
            $table->longtext('product_uses');
            $table->longtext('product_warranty');
            $table->integer('status');
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
