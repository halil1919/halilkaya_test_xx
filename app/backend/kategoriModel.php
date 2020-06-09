<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class kategoriModel extends Model
{
    protected $table = "kategori_models";
    public $timestamps = false;
    protected $fillable = ["parent_id","kategori_ad","kategori_resim","kategori_aktif","self_link"];

}
