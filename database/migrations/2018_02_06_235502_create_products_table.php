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
            $table->increments('id');
            $table->enum('product_group', ['storage-module', 'removal-module', 'extra', 'insurance']);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->float('display_order')->default(0);
            $table->enum('payment_period', ['weekly', 'once off'])->default('weekly');
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
