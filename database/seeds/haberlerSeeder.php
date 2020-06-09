<?php

use Illuminate\Database\Seeder;
use \Faker\Factory as Faker;
use \Illuminate\Support\Facades;
use \Illuminate\Support;

class haberlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fa = Faker::create("app\backend\haberler");
        for($x=0;$x < 6;$x++){

            DB::table('haberlers')->insert([
                "haber_baslik" => $fa->sentence(2),
                "haber_icerik" => $fa->sentence(250),
                "haber_resim" => "https://loremflickr.com/320/240",
                "aktif" => 1,
                "haber_self" => Str::slug($fa->sentence(2))
            ]);

        }

    }
}
