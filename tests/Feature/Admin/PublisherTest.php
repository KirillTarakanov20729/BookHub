<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class PublisherTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;

    public function test_index_publisher_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createPublisher();

        $publisher = $this->getPublisher();

        $this->get('/admin/publishers')->assertSuccessful();

        $this->get('/admin/publishers')->assertViewHas('publishers', function($collection) use ($publisher) {
            return $collection->contains($publisher);
        });
    }

    public function test_create_publisher_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $response = $this->get('/admin/publishers/create');

        $response->assertSuccessful();

        $this->post('admin/publishers', [
            'name' => 'test',
        ])->assertRedirect('admin/publishers');

        $this->assertDatabaseHas('publishers', [
            'name' => 'test',
        ]);
    }

    public function test_edit_publisher_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createPublisher();

        $publisher = $this->getPublisher();

        $this->get('/admin/publishers/' . $publisher->id . '/edit')->assertSuccessful();

        $this->put('admin/publishers/' . $publisher->id, [
            'id' => $publisher->id,
            'name' => 'test',
        ])->assertRedirect('admin/publishers');

        $this->assertDatabaseHas('publishers', [
            'id' => $publisher->id,
            'name' => 'test',
        ]);
    }

    public function test_delete_publisher_works(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->createPublisher();

        $publisher = $this->getPublisher();

        $this->delete('admin/publishers/' . $publisher->id)->assertRedirect('admin/publishers');

        $this->assertDatabaseMissing('publishers', [
            'id' => $publisher->id,
        ]);
    }
}
