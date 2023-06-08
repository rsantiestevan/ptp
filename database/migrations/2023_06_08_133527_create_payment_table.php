<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models\Course;
use Paycomet\Backoffice\User\Infrastructure\Repositories\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('payment_method')->nullable();
            $table->string('quantity');
            $table->string('amount');
            $table->string('currency')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Course::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
