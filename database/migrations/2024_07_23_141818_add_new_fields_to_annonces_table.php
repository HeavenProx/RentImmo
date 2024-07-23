<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->integer('metre');
            $table->integer('chambre');
            $table->integer('salleDeBain');
            $table->boolean('parking');
            $table->boolean('garage');
            $table->boolean('terrain');
            $table->enum('etat', ['Neuf', 'Rénové', 'Plateau']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->dropColumn(['metre', 'chambre', 'salleDeBain', 'parking', 'garage', 'terrain', 'etat']);
        });
    }
};
