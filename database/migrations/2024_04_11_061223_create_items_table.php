<?php

use App\Models\Stand;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('row_placement');
            $table->integer('column_placement');
            $table->decimal('depth', 4, 1)->nullable();
            $table->decimal('diameter', 4, 1)->nullable();
            $table->foreignIdFor(Stand::class)->constrained('stands')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
