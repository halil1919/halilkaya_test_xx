<?php

namespace App\Http\Controllers;

use App\katlistmodel;
use App\kullanıcıdetay;
use App\kullanıcıListesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class klist extends Controller
{
    public function show(){


        $klist = kullanıcıListesi::get();

        foreach ($klist as $item) {
           $a = $item->gecmis;
            echo $item->kulad."--".$a->tc."<br>";
        }


    }

    public function show2(){

        $veri = kullanıcıdetay::get();
        foreach($veri as $key){
            $data = $key->ait;
            echo $key->tc."--".$data->kulad."<br>";
        }

    }

    public function show3(){

        $kat = katlistmodel::where("parent_id",0)->get();
        foreach ($kat as $item) {
            $altkatx = $item->altkategori;
            echo $item->kategori_ad."<br>";
            foreach ($altkatx as $altkat){
                echo "---".$altkat->kategori_ad."<br>";
            }
        }
    }

    public function formshow(){
        return view('formtest');
    }

    public function formtest(Request $request){

        echo "<pre>";
        print_r($request->all());
        echo "</pre>";
    }
}
