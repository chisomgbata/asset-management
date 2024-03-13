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
        Schema::create('workstations', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('network_id');
            $table->string('proponent');
            $table->string('division');
            $table->string('used_by');
            $table->string('status');
            $table->string('sa_physical_id');
            $table->string('serial_no');
            $table->string('image');
            $table->string('model');
            $table->string('ip_address');
            $table->string('mac_address');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workstations');
    }
};
