<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('annonce', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->enum('type', ['Appartement', 'Maison', 'Villa', 'Magasin', 'Terrain']);
            $table->string('ville');
            $table->string('superficie');
            $table->boolean('neuf');
            $table->decimal('prix', 12);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('annonce');
    }
};