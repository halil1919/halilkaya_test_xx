<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class haberler extends Model
{
    protected $table = "haberlers";
    protected $fillable = ["haber_baslik","haber_icerik","haber_resim","aktif","haber_self"];
}
