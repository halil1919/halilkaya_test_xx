<?php

namespace App\Http\Controllers\backend;

use App\backend\kategoriModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\kategoriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class kategoriController extends Controller
{
    public function show(){
        //Anakategorileri alıyoruz
        $anakategoriler = kategoriModel::where("parent_id",0)->orderBy("id","DESC")->get();
        $toplamsay = $anakategoriler->count();
        return view('backend.kategoriler.index',compact('anakategoriler','toplamsay'));
    }
    public function kategoriekleform($parentid=0){
        $mainkategoriList = kategoriModel::where('parent_id',0)->get();
        $gelenid = $parentid;
        return view('backend.kategoriler.kategoriekle',compact('mainkategoriList','gelenid'));
    }

    public function kategoriekle(kategoriRequest $request){

            $resim = Storage::disk('uploads')->putFile("kategoriler",$request->file("kategori_resim"));
            $kategoriekle = new kategoriModel();
            $kategoriekle->parent_id = $request->parent_id;
            $kategoriekle->kategori_ad = $request->kategori_ad;
            $kategoriekle->kategori_resim = $resim;
            $kategoriekle->self_link = Str::slug($request->kategori_ad);
            $ekle = $kategoriekle->save();
            if($ekle){
                toastr()->success('tebrikler', 'Başarıyla Kategori Eklediniz');
                return redirect(route('.admin.kategoriler.kategorianasayfa'));
            }
    }

    public function kategorisil($id){

        //Silinen kategorinin resmini kaldırıyoruz
        $kategoribul = kategoriModel::where("id",$id)->first();
        Storage::disk('uploads')->delete("kategoriler/".$kategoribul->kategori_resim);

       $kategorisil = kategoriModel::where("id",$id)->delete();
       @$kategorialtsil = kategoriModel::where("parent_id",$id)->delete();
       if($kategorisil){
           toastr()->success('tebrikler', 'Başarıyla Kategori Sildiniz');
           return redirect(route('.admin.kategoriler.kategorianasayfa'));
       }

    }

    public function kategoriduzenleform($id){
        //update Gelen kategoriyi bulduk
        $gelenkategoribul = kategoriModel::where('id',$id)->firstOrFail();
        $mainkategoriList = kategoriModel::where('parent_id',0)->get();
        return view('backend.kategoriler.kategoriguncelleform',compact('gelenkategoribul','mainkategoriList','id'));
    }


}
