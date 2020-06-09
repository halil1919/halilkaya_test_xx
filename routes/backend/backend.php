<?php


/* Backend Controller Listesi */
Route::group(['prefix'=>"admin","as"=>".admin","namespace"=>"backend"],function (){
        //Admin anasayfayı gösterir
        Route::get('/','homeController@show')->name('.anasayfa');

        //Kategoriler Grup
        Route::group(['prefix'=>"kategoriler","as"=>".kategoriler"],function (){
            Route::get('/','kategoriController@show')->name('.kategorianasayfa');
            Route::get('/kategori-ekle/{parentid?}','kategoriController@kategoriekleform')->name('.kategoriekleform');
            Route::post('/kategori-ekle','kategoriController@kategoriekle')->name('.kategoriekle');
            Route::get('/kategori-duzenle/{id}','kategoriController@kategoriduzenleform')->name(".kategoriduzenleform");
            Route::get('/kategorisil/{id}','kategoriController@kategorisil')->name('.kategorisil');
       });

        Route::group(["prefix"=>"haberler","as"=>".haberler"],function (){
            Route::get('/','haberlerController@show')->name('.haberleranasayfa');
            Route::get('/haber-ekle','haberlerController@haberekleform')->name('.haberekleform');
            Route::post('/haber-ekle','haberlerController@habereklekayıt')->name('.habereklekayıt');

            Route::get('/haber-sil/{id}','haberlerController@habersil')->name('.habersil');

        });

});