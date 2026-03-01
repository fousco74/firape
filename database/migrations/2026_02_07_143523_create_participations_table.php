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
        Schema::create('participations', function (Blueprint $table) {
    $table->unsignedBigInteger('id_personne');
    $table->unsignedBigInteger('id_evenement');
    $table->string('role')->nullable();

    $table->foreign('id_personne')
          ->references('id_personne')
          ->on('personnes')
          ->onDelete('cascade');

    $table->foreign('id_evenement')
          ->references('id_evenement')
          ->on('evenements')
          ->onDelete('cascade');

    $table->primary(['id_personne', 'id_evenement']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
