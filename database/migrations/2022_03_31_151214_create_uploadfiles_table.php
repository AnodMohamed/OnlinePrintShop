<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadfiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('file')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('from')->nullable();
            $table->bigInteger('to')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->string('printColor')->nullable();
            $table->string('note')->nullable();
            $table->string('printType')->nullable();
            $table->string('printWay')->nullable();
            $table->string('paperType')->nullable();
            $table->string('paperSize')->nullable();
            $table->string('coverType')->nullable();
            $table->decimal('coverPrice')->nullable();
            $table->decimal('papersPrice')->nullable();
            $table->decimal('regular_price')->nullable(); 
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploadfiles');
    }
}
