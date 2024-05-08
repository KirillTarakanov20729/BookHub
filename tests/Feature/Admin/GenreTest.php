<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class GenreTest extends TestCase
{
   use RefreshDatabase;
   use CreateData;

   public function test_index_genre_works(): void
   {
       $this->createAdminUser();

       $user = $this->getAdminUser();

       $this->actingAs($user);

       $this->createGenre();

       $genre = $this->getGenre();

       $this->get('/admin/genres')->assertSuccessful();

       $this->get('/admin/genres')->assertViewHas('genres', function($collection) use ($genre) {
           return $collection->contains($genre);
       });
   }

   public function test_create_genre_works(): void
   {
       $this->createAdminUser();

       $user = $this->getAdminUser();

       $this->actingAs($user);

       $response = $this->get('/admin/genres/create');

       $response->assertSuccessful();

       $this->post('admin/genres', [
           'name' => 'test',
       ])->assertRedirect('admin/genres');

       $this->assertDatabaseHas('genres', [
           'name' => 'test',
       ]);
   }

   public function test_new_genre_is_visible_on_index_page(): void
   {
       $this->createAdminUser();

       $user = $this->getAdminUser();

       $this->actingAs($user);

       $this->createGenre();

       $genre = $this->getGenre();

       $this->get('/admin/genres')->assertViewHas('genres', function($collection) use ($genre) {
           return $collection->contains($genre);
       });
   }

   public function test_edit_genre_works(): void
   {
       $this->createAdminUser();

       $user = $this->getAdminUser();

       $this->actingAs($user);

       $this->createGenre();

       $genre = $this->getGenre();

       $this->get('/admin/genres/' . $genre->id . '/edit')->assertSuccessful();

       $this->put('admin/genres/' . $genre->id, [
           'id' => $genre->id,
           'name' => 'test',
       ])->assertRedirect('admin/genres');

       $this->assertDatabaseHas('genres', [
           'id' => $genre->id,
           'name' => 'test',
       ]);
   }

   public function test_delete_genre_works(): void
   {
       $this->createAdminUser();

       $user = $this->getAdminUser();

       $this->actingAs($user);

       $this->createGenre();

       $genre = $this->getGenre();

       $this->delete('admin/genres/' . $genre->id)->assertRedirect('admin/genres');

       $this->assertDatabaseMissing('genres', [
           'id' => $genre->id,
       ]);
   }
}
