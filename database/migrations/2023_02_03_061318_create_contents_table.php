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
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('language_id')->default(1);
            $table->string('title')->nullable();
            $table->string('image')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);

            $table->unsignedInteger('parent_id')->nullable()->default(null);


            $table->boolean('is_active')->default(1);

            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('contents')->onDelete('cascade');


            // $table->foreign('existing_record_id')->references('id')->on('content_blocks')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('content_id')->references('id')->on('contents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
};
