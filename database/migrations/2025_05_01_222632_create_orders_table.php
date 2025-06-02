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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('portal')->nullable();
            $table->string('door')->nullable();
            $table->text('notes')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->enum('payment_method', ['bank', 'paypal', 'credit_card']);
            $table->enum('state', ['pendiente', 'en proceso', 'completado'])->default('pendiente');
            $table->enum('delivery_method', ['recogida', 'entrega'])->default('recogida');
            $table->date('date');

            //Datos del metodo de pago
            $table->string('card_number')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_expiration')->nullable();
            $table->string('card_cvc')->nullable();

            $table->string('paypal_email')->nullable();

            $table->string('bank_owner')->nullable();
            $table->string('bank_iban')->nullable();
            $table->index('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
