<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMoreDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_more_details', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->string("size")->nullable();
            $table->string("type", 255)->nullable();
            $table->integer("price");
            $table->integer("count");
            $table->string("images");
            $table->integer("category_id")->nullable();
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
        Schema::dropIfExists('product_more_detail');
    }
}
