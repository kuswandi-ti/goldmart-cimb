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
        Schema::create('kredit_nasabah', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pencairan')->nullable();
            $table->string('nama_nasabah');
            $table->date('tgl_incoming')->nullable();
            $table->string('tlp_nasabah')->nullable();
            $table->text('alamat_nasabah')->nullable();
            $table->string('rekening_pencairan')->nullable();
            $table->string('barang')->nullable();
            $table->decimal('nilai_pencairan', 20, 2)->default(0);
            $table->decimal('margin_keuntungan', 20, 2)->default(0);
            $table->decimal('angsuran', 20, 2)->default(0);
            $table->integer('tenor')->default(0);
            $table->string('turun_plafon')->nullable();
            $table->string('periode_bulan')->nullable();
            $table->string('mitra')->nullable();
            $table->enum('status_lunas', ['Belum Lunas', 'Sudah Lunas'])->default('Belum Lunas');
            $table->enum('status_pengambilan_barang', ['Belum Diambil', 'Pending', 'Sudah Diambil']);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('restored_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('restored_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredit_nasabah');
    }
};
