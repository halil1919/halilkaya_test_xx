<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaberlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haberlers', function (Blueprint $table) {
            $table->id();
            $table->string('haber_baslik');
            $table->longText('haber_icerik');
            $table->string('haber_resim')->nullable();
            $table->enum("aktif",[1,0]);
            $table->string('haber_self');
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
        Schema::dropIfExists('haberlers');
    }
}
