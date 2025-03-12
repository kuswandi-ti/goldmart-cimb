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
        Schema::create('kredit_nasabah_tmp', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pencairan')->nullable();
            $table->string('nama_nasabah')->nullable();
            $table->string('no_loan')->nullable();
            $table->string('tlp_nasabah')->nullable();
            $table->text('alamat_nasabah')->nullable();
            $table->decimal('nilai_pencairan', 20, 2)->default(0);
            $table->decimal('gram_05', 20, 2)->nullable()->default(0);
            $table->decimal('gram_1', 20, 2)->nullable()->default(0);
            $table->decimal('gram_2', 20, 2)->nullable()->default(0);
            $table->decimal('gram_3', 20, 2)->nullable()->default(0);
            $table->decimal('gram_5', 20, 2)->nullable()->default(0);
            $table->decimal('gram_10', 20, 2)->nullable()->default(0);
            $table->decimal('gram_25', 20, 2)->nullable()->default(0);
            $table->decimal('gram_50', 20, 2)->nullable()->default(0);
            $table->decimal('gram_100', 20, 2)->nullable()->default(0);
            $table->decimal('total_keping', 20, 2)->nullable()->default(0);
            $table->decimal('total_gram', 20, 2)->nullable()->default(0);
            $table->decimal('angsuran', 20, 2)->nullable()->default(0);
            $table->integer('tenor')->nullable()->default(0);
            $table->string('tgl_lunas')->nullable();
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
        Schema::dropIfExists('kredit_nasabah_tmp');
    }
};
