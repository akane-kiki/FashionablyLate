<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Category;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id')->toArray();

        // 35個のコンタクトを生成し、それぞれにランダムなカテゴリを割り当てる
        Contact::factory()->count(35)->create([
            'category_id' => function () use ($categories) {
                return $categories[array_rand($categories)];
            },
        ]);
    }
}
