<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\posts;
use Database\Factories\AvatarsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = categories::create([
            'Category_Name' => 'Prueba'
        ]);
        $post = posts::create([
            'ID_User' => '1',
            'Title' => 'Prueba',
            'Post' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit elit quis massa convallis ornare.',
            'Upvote' => '25',
            'Downvote' => '-15'
        ]);
        $post->categories()->attach(['categories_id' => 1], ['posts_id' => 1]);
        $post2 = posts::create([
            'ID_User' => '1',
            'Title' => 'Prueba2',
            'Post' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit elit quis massa convallis ornare.',
            'Upvote' => '73',
            'Downvote' => '-1'
        ]);
        $post2->categories()->attach(['categories_id' => 1], ['posts_id' => 2]);

    }
}
