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
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('serial_number');
            $table->string('brand');
            $table->text('description');
            $table->string('purpose');
            $table->dateTime('oem_support_end_date');
            $table->integer('estimated_renewal_cost');
            $table->string('status');
            $table->dateTime('eol_date');
            $table->string('oem_renewal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
