<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['email' => 'johndoe@example.com']);
        $this->call(PublicationSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
