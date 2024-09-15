<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('laundryitems', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('receipts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('laundryitems', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('receipts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }   
};
