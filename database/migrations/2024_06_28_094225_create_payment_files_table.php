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
        Schema::create('payment_files', function (Blueprint $table) {
            $table->id();
            $table->text('file');
            $table->string('type');
            $table->string('mime_type');
            $table->unsignedInteger('size');
            $table->foreignIdFor(\App\Models\Payment::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_files');
    }
};
