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
        Schema::create('fee_weeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('month');       // 1..12
            $table->unsignedTinyInteger('week_of_month'); // 1..5
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('due_amount')->default(config('komite.weekly_fee', 2000));
            $table->unique(['year','month','week_of_month']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_weeks');
    }
};
