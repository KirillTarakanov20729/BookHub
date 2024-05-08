<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;
    use WithFaker;

    public function test_index_books_works(): void
    {
        $this->createData();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $book = $this->getBook();

        $this->get('/admin/books')->assertSuccessful();

        $this->get('/admin/books')->assertViewHas('books', function($collection) use ($book) {
            return $collection->contains($book);
        });
    }


    public function test_edit_book_works(): void
    {
        $this->createData();

        $user = $this->getAdminUser();

        $this->actingAs($user);


        $book = $this->getBook();

        $this->get('/admin/books/' . $book->id . '/edit')->assertSuccessful();

        $this->put('admin/books/' . $book->id, [
            'id' => $book->id,
            'name' => 'test1',
            'short_description' => 'test',
            'full_description' => 'test',
            'release_date' => '27.02.2022',
            'subscription_type_id' => 1,
            'authors_id' => [$this->getAuthor()->id],
            'publishers_id' => [$this->getPublisher()->id],
            'genres_id' => [$this->getGenre()->id],
            'age_limit_id' => $this->GetAgeLimit()->id
        ])->assertRedirect('/admin/books');

        $this->assertDatabaseHas('books', [
            'name' => 'test1',
        ]);
    }

    public function test_delete_book_works(): void
    {
        $this->createData();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $book = $this->getBook();

        $this->delete('admin/books/' . $book->id)->assertRedirect('/admin/books');

        $this->assertDatabaseMissing('books', [
            'id' => $book->id
        ]);
    }



}
