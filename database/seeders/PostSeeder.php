<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();

        Post::factory(9)->hasAttached($tags)->create(new Sequence([
            'featured' => false,
            'employer_id'=>'1',
            'title'=>fake()->title,

        ], [
            'featured' => true,
            'employer_id'=>'1',
            'title'=>fake()->title,

        ]));
    }
}
