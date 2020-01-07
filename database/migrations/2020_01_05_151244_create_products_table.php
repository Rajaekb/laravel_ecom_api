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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('img')->nullable();
            $table->string('details')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('categorie_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('store_id')
                  ->references('id')
                  ->on('stores')
                  ->onDelete('cascade');

            $table->foreign('categorie_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
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

        Schema::table('products', function (Blueprint $table) { 
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['store_id']);
            $table->dropColumn('store_id');
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
        });
    }
}
