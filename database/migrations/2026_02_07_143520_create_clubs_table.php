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
       Schema::create('clubs', function (Blueprint $table) {
        $table->id('id_club');
        $table->string('nom_club');
        $table->string('type_club')->nullable();
        $table->string('localite')->nullable();

        $table->unsignedBigInteger('id_ligue');
        $table->foreign('id_ligue')
            ->references('id_ligue')
            ->on('ligues')
            ->onDelete('cascade');

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
