<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        if (Schema::hasTable('cats')) {
            DB::table('cats')->truncate();
        }
        for($i = 1; $i < 5; $i++){
            \App\Cat::create([
                'name' => $faker->Company
            ]);
        }
    }
}
