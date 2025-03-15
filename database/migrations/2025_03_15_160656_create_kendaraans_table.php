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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->unsignedBigInteger('id_user')->index();
            $table->string('plat_nomor', 20);
            $table->enum('tipe', ['motor', 'mobil']);
            $table->string('no_stnk', 255);
            $table->timestamp('created_at')->useCurrent(); // Perbaiki
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
