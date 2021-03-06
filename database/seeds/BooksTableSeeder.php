<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'user_id' => $faker->numberBetween(1, 100),
                'item_name' => $faker->word(),
                'item_number' => $faker->numberBetween(1, 999),
                'item_amount' => $faker->numberBetween(100, 20000),
                'item_img' => '',
                'published' => $faker->dateTime('now'),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
