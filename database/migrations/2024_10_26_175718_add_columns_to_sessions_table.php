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
        Schema::table('sessions', function (Blueprint $table) {
            $table->text('payload');         // Datos de la sesión
            $table->integer('last_activity'); // Última actividad
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('payload');         // Eliminar columna payload
            $table->dropColumn('last_activity'); // Eliminar columna last_activity
        });
    }
};
