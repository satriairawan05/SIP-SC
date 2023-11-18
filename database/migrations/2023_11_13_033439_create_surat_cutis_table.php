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
        Schema::create('surat_cutis', function (Blueprint $table) {
            $table->increments('sc_id');
            $table->foreignId('pic_id')->nullable();
            $table->foreignId('pengganti_id')->nullable();
            $table->foreignId('departemen_id')->nullable();
            $table->foreignId('cuti_id')->nullable();
            $table->string('sc_no_surat')->nullable();
            $table->string('sc_no_surat_old')->nullable();
            $table->date('sc_tgl_surat')->nullable();
            $table->date('sc_tgl_surat_rev')->nullable();
            $table->date('sc_tgl_ambil_start')->nullable();
            $table->date('sc_tgl_ambil_end')->nullable();
            $table->date('sc_tgl_kembali')->nullable();
            $table->string('sc_jumlah_cuti')->nullable();
            $table->string('sc_approved_step')->nullable();
            $table->string('sc_remark')->nullable();
            $table->string('sc_print_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_cutis');
    }
};
