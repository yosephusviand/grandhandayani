<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJimpitanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jimpitan', function (Blueprint $table) {
            $table->id();
            $table->integer('warga')->nullable();
            $table->integer('nominal')->default('500');
            $table->integer('bulan')->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jimpitan');
    }
}
