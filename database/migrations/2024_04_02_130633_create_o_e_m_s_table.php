<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('o_e_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('owner')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->text('description')->nullable();
            $table->string('purpose')->nullable();
            $table->date('oem_support_end_date')->nullable();
            $table->date('eol_date')->nullable();
            $table->string('oem_renewal')->nullable();
            $table->string('support_level')->nullable();
            $table->decimal('estimated_renewal_cost', 10, 2)->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_e_m_s');
    }
};
