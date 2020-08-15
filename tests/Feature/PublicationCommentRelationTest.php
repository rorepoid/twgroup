<?php

namespace Tests\Feature;

use App\Comment;
use App\Publication;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicationCommentRelationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function publication_has_comments()
    {
        // Arrange
        $user = factory(User::class)->create();
        $publication = factory(Publication::class)->create(['user_id' => $user->id]);
        
        // Act
        $publication->comments()->createMany([
            [
                'content' => 'this is a comment',
                'status' => 'APROBADO'
            ],
            [
                'content' => 'this is another comment',
                'status' => 'NONE'
            ]
        ]);
        
        // Assert
        $this->assertEquals(2, $publication->comments()->count());
        $this->assertEquals($publication->id, Comment::find(1)->publication_id);
        $this->assertEquals(Publication::first(), Comment::find(2)->publication);
    }
}
