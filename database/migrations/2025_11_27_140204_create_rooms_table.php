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
        Schema::create('rooms', function (Blueprint $table) {
$table->id();
$table->string('number')->unique();            // 101, 102, etc.
$table->string('type');                       // Single, Double, Suite
$table->unsignedInteger('capacity');          // 1, 2, 3 personas
$table->decimal('price_per_night', 10, 2);    // 45000.00
$table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
