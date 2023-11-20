<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('price');
            $table->string('description');
            $table->integer('stock');
            $table->string('image')->default('https://source.unsplash.com/random');
            $table->uuid("user_id");
            $table->uuid("product_category_id");
            $table->foreign("user_id")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("product_category_id")->references("id")->on("product_categories")->onUpdate("CASCADE")->onDelete("CASCADE");
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
};
