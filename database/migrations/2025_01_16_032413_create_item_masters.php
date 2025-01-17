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
        Schema::create('item_masters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_item');
            $table->string('merk');
            $table->string('seri');
            $table->integer('stok');
            $table->string('nama_item');
            $table->string('spesifikasi');
            $table->integer('category_id');
            $table->integer('harga_per_hari');
            $table->integer('harga_per_jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_masters');
    }
};
