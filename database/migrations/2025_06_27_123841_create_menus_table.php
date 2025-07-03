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
        Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('toko_id'); // Foreign key to toko
        $table->string('nama_menu');
        $table->decimal('harga', 10, 2);
        $table->text('deskripsi')->nullable();
        $table->timestamps();

        $table->foreign('toko_id')->references('id')->on('tokos')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
