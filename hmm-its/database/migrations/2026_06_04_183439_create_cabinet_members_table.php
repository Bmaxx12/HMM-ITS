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
    Schema::create('cabinet_members', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cabinet_unit_id')->constrained()->cascadeOnDelete();
        $table->string('name', 150);
        $table->string('position', 150);
        $table->string('photo')->nullable();
        $table->unsignedTinyInteger('order_number')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabinet_members');
    }
};
