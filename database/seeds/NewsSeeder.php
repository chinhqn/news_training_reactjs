<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        if (Schema::hasTable('news')) {
            DB::table('news')->truncate();
        }
        $cats = \App\Cat::all();
        foreach ($cats as $cat){
            for($i = 1; $i < 15; $i++){
                \App\News::create([
                    'name' => $faker->name,
                    'preview_text' => $faker->sentence(2,true),
                    'detail_text' => $faker->text ,
                    'image' =>  $faker->imageUrl(300,300,null,true),
                    'id_cat' => $cat->id,
                ]);
            }
        }


    }
}
