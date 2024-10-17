<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            // $table->enum("party_type", ['vendor', 'client', 'employee'])->nullable();
            $table->string("party_type")->nullable();
            $table->string("fullname", 100)->nullable();
            $table->string("phone_number", 15)->nullable();
            $table->string("address")->nullable();
            $table->string("account_holder_name")->nullable();
            $table->string("account_number")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("ifsc_code")->nullable();
            $table->text("branch_address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('parties');
    }
};
