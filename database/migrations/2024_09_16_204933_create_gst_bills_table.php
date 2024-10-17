<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->integer("party_id")->nullable();
            $table->date("invoice_data")->nullable();
            $table->string("invoice_number")->nullable();
            $table->text("item_description")->nullable();
            $table->float("total_amount", 10, 2)->default(0);
            $table->float("tax_percentage", 10, 2)->default(0);
            $table->float("net_amount", 10, 2)->default(0);
            $table->text("declaration", 10, 2)->nullable();
            $table->tinyInteger("is_deleted")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('gst_bills');
    }
};
