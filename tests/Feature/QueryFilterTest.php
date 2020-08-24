<?php

namespace Tests\Feature;

use App\Comment;
use App\Publication;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QueryFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_publications_with_comments_that_says_hola_and_has_aproved_status()
    {
        // Arrange
        $arrange = $this->arrange();
        $word = 'Hola';
        $status = 'APROBADO';

        // Act
        $results = Publication::whereHas('comments', function (Builder $query) use ($word, $status) {
            $query->where('content', 'like', "%${word}%")
                ->whereStatus("${status}");
        })->get();

        // Only Publications with id 1 and 3 meet the requirements
        $this->assertEquals($arrange[0]->fresh(), $results[0]);
        $this->assertEquals($arrange[1]->fresh(), $results[1]);

    }

    /**
     * Only Publications with id 1 and 3 meet the requirements
     */
    public function arrange()
    {
        $user = factory(User::class)->create();
        $publication1 = factory(Publication::class)->create(['user_id' => $user->id]);
        $publication2 = factory(Publication::class)->create(['user_id' => $user->id]);
        $publication3 = factory(Publication::class)->create(['user_id' => $user->id]);
        $publication4 = factory(Publication::class)->create(['user_id' => $user->id]);
        $publication5 = factory(Publication::class)->create(['user_id' => $user->id]);

        // Act
        $publication1->comments()->createMany([
            [
                'content' => 'Hola, saludos',
                'user_id' => $user->id,
                'status' => 'APROBADO'
            ],
            [
                'content' => 'this is an example comment',
                'user_id' => $user->id,
                'status' => 'NONE'
            ],
            [
                'content' => 'Hola a todos',
                'user_id' => $user->id,
                'status' => 'PADORU'
            ]
        ]);

        $publication2->comments()->createMany([
            [
                'content' => 'Saludos a todos',
                'user_id' => $user->id,
                'status' => 'APROBADO'
            ],
            [
                'content' => 'this is an example comment',
                'user_id' => $user->id,
                'status' => 'NONE'
            ],
            [
                'content' => 'Hola a todos',
                'user_id' => $user->id,
                'status' => 'PADORU'
            ]
        ]);

        $publication3->comments()->createMany([
            [
                'content' => 'Hola, saludos',
                'user_id' => $user->id,
                'status' => 'APROBADO'
            ],
            [
                'content' => 'this is an example comment',
                'user_id' => $user->id,
                'status' => 'NONE'
            ],
            [
                'content' => 'Hola a todos',
                'user_id' => $user->id,
                'status' => 'APROBADO'
            ]
        ]);

        $publication5->comments()->createMany([
            [
                'content' => 'this is an example comment',
                'user_id' => $user->id,
                'status' => 'NONE'
            ],
            [
                'content' => 'Hola a todos',
                'user_id' => $user->id,
                'status' => 'PADORU'
            ]
        ]);

        return [$publication1, $publication3];
    }
}
