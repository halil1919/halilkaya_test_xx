<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kullanıcıdetay;

class kullanıcıListesi extends Model
{
    protected $table = "kullanıcılar";
    protected $fillable = ["kid","kulad"];

    public function gecmis(){
        return $this->hasOne('App\kullanıcıdetay','kul_id','kid');
    }

}
