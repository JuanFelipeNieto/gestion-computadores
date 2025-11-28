<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('computadores', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo')->nullable();
            $table->integer('ram_gb');
            $table->integer('almacenamiento_gb');
            $table->decimal('precio', 10, 2)->nullable();

            $table->foreignId('tipo_id')->constrained('tipo_computadores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('computadores');
    }
};
