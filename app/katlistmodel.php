<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katlistmodel extends Model
{
    protected $table = "kategoriler";

    public function altkategori(){
        return $this->hasMany('App\katlistmodel','parent_id','kid');
    }

}
