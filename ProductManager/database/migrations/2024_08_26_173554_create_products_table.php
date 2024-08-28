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
            $table->id()->comment('商品ID');
            $table->string('name', 20)->comment('商品名');
            $table->string('description', 200)->nullable()->comment('商品説明');
            $table->integer('price')->comment('金額');
            $table->unsignedBigInteger('category_id')->nullable()->comment('カテゴリID');
            $table->unsignedBigInteger('maker_id')->nullable()->comment('メーカーID');
            $table->softDeletes()->comment('削除日');
            $table->timestamps();

            //外部キー制約
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->foreign('maker_id')
                ->references('id')
                ->on('makers')
                ->onDelete('set null');
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
