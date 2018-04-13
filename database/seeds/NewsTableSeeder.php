<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(100),
            'preview_text' => str_random(100),
            'detail_text' => str_random(100),
            'image' => str_random(10).'png',
        ]);
    }

}
