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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->foreignId('id_area')
                  ->nullable()
                  ->after('id')
                  ->constrained('areas')
                  ->nullOnDelete();

            $table->string('rol')->nullable()->after('id_area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['id_area']);
            $table->dropColumn(['id_area', 'rol']);
        });
    }
};
