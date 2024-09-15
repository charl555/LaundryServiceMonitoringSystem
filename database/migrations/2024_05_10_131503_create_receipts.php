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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); // Foreign key column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint    
            $table->unsignedBigInteger('ServiceID'); // Foreign key column
            $table->foreign('ServiceID')->references('id')->on('service')->onDelete('cascade'); // Foreign key constraint
            $table->integer('Ammount');
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
        Schema::dropIfExists('receipts');
    }
};
