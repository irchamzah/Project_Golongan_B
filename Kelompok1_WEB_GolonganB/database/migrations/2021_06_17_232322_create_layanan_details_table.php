<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_details', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan_id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('file')->default('');
            $table->string('tanggaljemput');
            $table->string('keterangan');
            $table->string('status_id');
            $table->string('pendapatan');
            $table->string('path')->default('');
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
        Schema::dropIfExists('layanan_details');
    }
}
