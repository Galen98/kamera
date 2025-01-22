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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->string('customer_name');
            $table->text('no_wa');
            $table->integer('total_amount');
            $table->integer('dibayar');
            $table->integer('hari_sewa');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->boolean('status')->default(false);
            $table->boolean('invoice_status');
            $table->integer('penalty')->default(0);
            $table->enum('payment_status', ['paid', 'pending'])->default('pending');
            $table->integer('overdue')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('transaction');
    }
};
