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
        //

        Schema::table('software', function (Blueprint $table) {
            $table->string('model')->nullable()->change();
            $table->string('serial_number')->nullable()->change();
            $table->string('brand')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('purpose')->nullable()->change();
            $table->integer('estimated_renewal_cost')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('oem_renewal')->nullable()->change();
        });

        Schema::table('hardware', function (Blueprint $table) {
            $table->string('model')->nullable()->change();
            $table->string('serial_number')->nullable()->change();
            $table->string('brand')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('purpose')->nullable()->change();
            $table->date('oem_support_end_date')->nullable()->change();
            $table->integer('estimated_renewal_cost')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->date('eol_date')->nullable()->change();
            $table->string('oem_renewal')->nullable()->change();
        });

        Schema::table('servers', function (Blueprint $table) {
            $table->string('host_name')->nullable()->change();
            $table->string('ip_address')->nullable()->change();
            $table->string('owner')->nullable()->change();
        });

        Schema::table('workstations', function (Blueprint $table) {
            $table->string('location')->nullable()->change();
            $table->string('network_id')->nullable()->change();
            $table->string('proponent')->nullable()->change();
            $table->string('division')->nullable()->change();
            $table->string('used_by')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('sa_physical_id')->nullable()->change();
            $table->string('serial_no')->nullable()->change();
            $table->string('model')->nullable()->change();
            $table->string('ip_address')->nullable()->change();
            $table->string('mac_address')->nullable()->change();
        });

        Schema::table('telephones', function (Blueprint $table) {
            $table->string('model')->nullable()->change();
            $table->string('serial_number')->nullable()->change();
            $table->string('ext')->nullable()->change();
            $table->string('user')->nullable()->change();
            $table->string('location')->nullable()->change();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
