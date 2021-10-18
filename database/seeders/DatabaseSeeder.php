<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis metus a dolor tristique, vel consectetur neque aliquet. Ut dolor tortor, porttitor placerat purus auctor, finibus egestas tellus. Sed eleifend vulputate rhoncus. Ut condimentum a orci et bibendum. Proin volutpat scelerisque neque vitae feugiat. Nam quis dui a libero condimentum sodales et imperdiet velit. Quisque sodales commodo quam eget suscipit. Cras vehicula tortor sed tempor tempor. Integer quis mauris ornare, venenatis elit vitae, pellentesque est. Nam blandit augue id dapibus maximus.</p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis metus a dolor tristique, vel consectetur neque aliquet. Ut dolor tortor, porttitor placerat purus auctor, finibus egestas tellus. Sed eleifend vulputate rhoncus. Ut condimentum a orci et bibendum. Proin volutpat scelerisque neque vitae feugiat. Nam quis dui a libero condimentum sodales et imperdiet velit. Quisque sodales commodo quam eget suscipit. Cras vehicula tortor sed tempor tempor. Integer quis mauris ornare, venenatis elit vitae, pellentesque est. Nam blandit augue id dapibus maximus.</p>',
        ]);
    }
}
