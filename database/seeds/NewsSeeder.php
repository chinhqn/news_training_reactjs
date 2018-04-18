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
        $cat = \App\Cat::select('id')->get()->toArray();
        for($i = 1; $i < 20; $i++){
            \App\News::create([
                'name' => $faker->title,
                'preview_text' => $faker->title,
                'detail_text' => $faker->text ,
                'image' => $faker->name,
                'id_cat' => array_rand($cat),
            ]);
        }

    }
}
