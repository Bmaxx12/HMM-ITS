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
    Schema::create('cabinet_units', function (Blueprint $table) {
        $table->id();
        $table->string('name', 150);
        $table->enum('tier', ['leadership_core', 'directing', 'executing', 'advisory']);
        $table->foreignId('parent_unit_id')->nullable()->constrained('cabinet_units')->nullOnDelete();
        $table->unsignedTinyInteger('order_number')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabinet_units');
    }
};
