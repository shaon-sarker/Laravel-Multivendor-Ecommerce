<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id')->index()->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('seller_id')->index()->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_sku');
            $table->integer('product_qty')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('buying_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->text('short_descp')->nullable();
            $table->longText('long_descp')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_features')->nullable();
            $table->string('product_item_tags')->nullable();
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
