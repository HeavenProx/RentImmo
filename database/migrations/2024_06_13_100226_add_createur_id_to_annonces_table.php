<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->foreignId('createur_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->dropForeign(['createur_id']);
            $table->dropColumn('createur_id');
        });
    }
};
