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
        Schema::table('software', function (Blueprint $table) {
            $table->date('eol_date')->nullable()->change();
            $table->date('oem_support_end_date')->nullable()->change();
        });

        Schema::table('hardware', function (Blueprint $table) {
            $table->date('eol_date')->nullable()->change();
            $table->date('oem_support_end_date')->nullable()->change();
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
