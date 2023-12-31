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
        Schema::create('pemakaians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('warga_id')->unsigned();
            $table->foreign('warga_id')->references('id')->on('wargas');
            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
            $table->integer('meteran_pemakaian');
            $table->integer('total');
            $table->integer('nominal_bayar');
            $table->string('foto1', 100)->unique();
            $table->string('foto2', 100)->unique();
            $table->boolean('sudah_bayar')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaians');
    }
};
