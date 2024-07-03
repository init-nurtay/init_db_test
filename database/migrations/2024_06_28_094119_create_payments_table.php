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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();//description
            $table->text('comment')->nullable();//comment
            $table->timestamp('payment_of_date_at')->nullable(); //date of payment

            $table->string('type_payment')->nullable();//seo,hosting
            $table->string('type_operation')->nullable();//income, expense
            $table->string('status')->nullable();//pending, completed
            $table->decimal('amount')->nullable();//amount

            $table->string('replay')->nullable();//every month, every year, every week

            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
