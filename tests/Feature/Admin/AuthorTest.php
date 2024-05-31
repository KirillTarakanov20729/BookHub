<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;

    public function test_index_author_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createAuthor();

        $author = $this->getAuthor();

        $this->get('/admin/authors')->assertSuccessful();

        $this->get('/admin/authors')->assertViewHas('authors', function($collection) use ($author) {
            return $collection->contains($author);
        });
    }

    public function test_create_author_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $response = $this->get('/admin/authors/create');

        $response->assertSuccessful();

        $this->post('admin/authors', [
            'first_name' => 'test',
            'last_name' => 'test',
            'middle_name' => 'test',
        ])->assertRedirect('admin/authors');

        $this->assertDatabaseHas('authors', [
            'first_name' => 'test',
        ]);
    }

    public function test_new_author_is_visible_on_index_page(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createAuthor();

        $author = $this->getAuthor();

        $this->get('/admin/authors')->assertViewHas('authors', function($collection) use ($author) {
            return $collection->contains($author);
        });
    }

    public function test_edit_author_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createAuthor();

        $author = $this->getAuthor();

        $this->get('/admin/authors/' . $author->id . '/edit')->assertSuccessful();

        $this->put('admin/authors/' . $author->id, [
            'id' => $author->id,
            'first_name' => 'test',
            'last_name' => 'test',
            'middle_name' => 'test',
        ])->assertRedirect('admin/authors');

        $this->assertDatabaseHas('authors', [
            'id' => $author->id,
            'first_name' => 'test',
        ]);
    }

    public function test_delete_author_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createAuthor();

        $author = $this->getAuthor();

        $this->delete('admin/authors/' . $author->id)->assertRedirect('admin/authors');

        $this->assertDatabaseMissing('authors', [
            'id' => $author->id,
        ]);
    }
}
