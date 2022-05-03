<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Plan;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('/storage/images/');
        Storage::makeDirectory('/storage/images/');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        for($i = 1; $i <= 10; $i++){
            $post = Post::factory(1)->create([
                'user_id' => $user->id
            ]);

            Image::factory(1)->create([
                'imageable_id' => $i,
                'imageable_type' => Post::class
            ]);
        }

        for($i = 1; $i <= 10; $i++){
            $category = Category::factory(1)->create();

            Image::factory(rand(1, 3))->create([
                'imageable_id' => $i,
                'imageable_type' => Category::class
            ]);
        }

        for($i = 1; $i <= 10; $i++){
            $plan = Plan::factory(1)->create();
            Feature::factory(rand(1,5))->create([
                'plan_id' => $i
            ]);
        }

    }
}
