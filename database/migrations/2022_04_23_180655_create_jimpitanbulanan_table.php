<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJimpitanbulananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jimpitanbulanan', function (Blueprint $table) {
            $table->id();
            $table->integer('idwarga');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('nominal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jimpitanbulanan');
    }
}
