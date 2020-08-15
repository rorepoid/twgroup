<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 10)->create();
        factory(Comment::class, 3)->create(['user_id' => 1]);
    }
}
