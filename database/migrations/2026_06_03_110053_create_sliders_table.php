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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable(); // NEW ARRIVALS
            $table->string('title_line1'); // Night Spring
            $table->string('title_line2'); // Dresses
            $table->string('button_text')->default('Shop Now');
            $table->string('link_type')->nullable(); // category / product / external
            $table->unsignedBigInteger('link_id')->nullable();
            $table->string('external_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
