<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kullanıcıListesi;

class kullanıcıdetay extends Model
{
    protected $table = "gecmiş";
    protected $fillable = ["kul_id","detay","tc"];

    public function ait(){
        return $this->belongsTo('App\kullanıcıListesi','kul_id','kid');
    }
}
