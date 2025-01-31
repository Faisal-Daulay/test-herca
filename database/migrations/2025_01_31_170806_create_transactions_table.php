<?php

declare(strict_types=1);

use App\Models\Cargo;
use App\Models\Marketing;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Marketing::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Cargo::class)->constrained()->cascadeOnDelete();
            $table->string('transaction_number');
            $table->unsignedBigInteger('total_balance');
            $table->unsignedBigInteger('grand_total');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
