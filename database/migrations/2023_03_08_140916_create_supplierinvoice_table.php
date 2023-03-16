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
        Schema::create('supplierinvoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('invoice_day')->nullable();
            $table->longText('name_supplier')->nullable();
            $table->longText('invoice_number')->nullable();
            $table->longText('product')->nullable();
            $table->longText('unit')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('invoice_quantity')->nullable();
            $table->longText('difference')->nullable();
            $table->longText('price')->nullable();
            $table->longText('payment_type')->nullable();
            $table->longText('total_quantity')->nullable();
            $table->longText('total_invoice_quantity')->nullable();
            $table->longText('total_price')->nullable();
            $table->longText('total_credit')->nullable();
            $table->longText('total_cash')->nullable();
            $table->longText('file_image')->nullable();
            $table->longText('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplierinvoice');
    }
};
