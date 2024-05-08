<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;
    public function test_main_page_is_visible(): void
    {
        $this->createUsualUser();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/books/home');

        $response->assertStatus(200);
    }

    public function test_index_page_is_visible(): void
    {
        $this->createUsualUser();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/books');

        $response->assertStatus(200);
    }
}
