<?php

namespace App\Http\Controllers\backend;

use App\backend\haberler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class haberlerController extends Controller
{
    public function show(){
        $haberler = haberler::all();
        return view("backend.haberler.index",compact("haberler"));
    }

    public function haberekleform(){
        return view("backend.haberler.haberekle");
    }

    public function habereklekayıt(Request $request){

        $request->validate([
            "haber_baslik" => "required",
            "haber_icerik" => "required"
        ]);

        $resim = "";

        if($request->file("haber_resim")!=""){
            $resim = Storage::disk('uploads')->putFile("haberler/",$request->file('haber_resim'));
        }

        $haberekle = new haberler();
        $haberekle->haber_baslik = $request->haber_baslik;
        $haberekle->haber_icerik = $request->haber_icerik;
        $haberekle->haber_resim = $resim;
        $haberekle->haber_self = Str::slug($request->haber_baslik);
        $ekle = $haberekle->save();

        if($ekle){
            toastr()->success('tebrikler', 'Başarıyla Kategori Eklediniz');
            return redirect(route('.admin.haberler.haberleranasayfa'));
        }else{
            echo "Sorun var";
        }

    }

    public function habersil($id){
        $sil = haberler::where("id",$id)->delete();
        if($sil){
            toastr()->success('tebrikler', 'Başarıyla Silindi');
            return redirect(route('.admin.haberler.haberleranasayfa'));
        }
    }



}
