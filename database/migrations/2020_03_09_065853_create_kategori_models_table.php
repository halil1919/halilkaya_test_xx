<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_models', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0)->unsigned();
            $table->string('kategori_ad',100)->nullable();
            $table->string('kategori_resim');
            $table->boolean('kategori_aktif')->default(1);
            $table->string('self_link',224);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_models');
    }
}
