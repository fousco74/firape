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
       Schema::create('membre_commission', function (Blueprint $table) {
    $table->unsignedBigInteger('id_personne');
    $table->unsignedBigInteger('id_commission');

    $table->foreign('id_personne')
          ->references('id_personne')
          ->on('personnes')
          ->onDelete('cascade');

    $table->foreign('id_commission')
          ->references('id_commission')
          ->on('commissions')
          ->onDelete('cascade');

    $table->primary(['id_personne', 'id_commission']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_commission');
    }
};
