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
        // تولید جدول محصولات
        Schema::create("products", function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title' , 50);
            $table->text('description');
            $table->string('image');
            $table->integer('category_id');
            $table->integer('factory_id');
            $table->enum('status',['draft','published','rejected'])->default('draft');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
