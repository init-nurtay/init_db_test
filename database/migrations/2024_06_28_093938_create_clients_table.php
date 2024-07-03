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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type_organization')->nullable();//тип организации
            $table->text('identification_number')->nullable();//номер идентификации
            $table->string('name_organization');//название организации
            $table->string('full_name');//полное имя
            $table->string('agent_type')->nullable();//тип агента

//            $table->string('bank_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('identification_code')->nullable();//код идентификации
            $table->text('beneficiary_code')->nullable();//код бенефициара

            $table->foreignId('address_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
