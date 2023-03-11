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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('menu_id');
            $table->string('image')->nullable()->default(null);
            $table->string('slug')->unique();
            
            $table->text('description');
            $table->text('meta_title')->nullable()->default(null);
            $table->text('meta_keys')->nullable()->default(null);
            $table->text('meta_desc')->nullable()->default(null);

            $table->tinyInteger('status')->default(0);


           $table->timestamps();


        //    $table->foreign('category_id')->references('id')->on('categories')->ondelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');

    }
};
