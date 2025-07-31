<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->string('paypal_id')->nullable();
            $table->string('paypal_status')->default('sendbox')->nullable();
            $table->text('stripe_public_key')->nullable();
            $table->text('stripe_secret_key')->nullable();
            $table->integer('is_cash_delivery')->default(1);
            $table->integer('is_paypal')->default(1);
            $table->integer('is_stripe')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_settings');
    }
};