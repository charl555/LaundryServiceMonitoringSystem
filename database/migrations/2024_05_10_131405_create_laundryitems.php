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
        Schema::create('laundryitems', function (Blueprint $table) {
            $table->increments('LaundryItemsID');
            $table->unsignedBigInteger('ServiceID');
            $table->foreign('ServiceID')->references('id')->on('service')->onDelete('cascade');
            $table->text('itemdescription');
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
        Schema::dropIfExists('laundryitems');
    }
};
