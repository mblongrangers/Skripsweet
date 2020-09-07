<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManualInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_invoice_product', function (Blueprint $table) {
            $table->unsignedInteger('quantity');
            $table->unsignedTinyInteger('product_id');
            $table->unsignedInteger('manual_invoice_id');

            $table->foreign('manual_invoice_id')
                ->references('id')
                ->on('manual_invoices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_invoice_product');
    }
}
