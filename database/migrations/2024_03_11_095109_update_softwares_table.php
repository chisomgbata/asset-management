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
            $table->enum('owner', ['CCG', 'IPG'])->nullable();
        });

        Schema::table('hardware', function (Blueprint $table) {
            $table->enum('owner', ['CCG', 'IPG'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('software', function (Blueprint $table) {
            $table->dropColumn('owner');
        });

        Schema::table('hardware', function (Blueprint $table) {
            $table->dropColumn('owner');
        });
    }
};
