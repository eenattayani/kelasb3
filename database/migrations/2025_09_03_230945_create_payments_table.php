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
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fee_week_id')->constrained('fee_weeks')->cascadeOnDelete();
            $table->unsignedInteger('amount');
            $table->dateTime('paid_at');
            $table->string('method')->nullable(); // cash/transfer/dll
            $table->text('note')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->unique(['student_id','fee_week_id']);
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
