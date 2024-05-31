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
        $this->createData();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/books/home');

        $response->assertStatus(200);
    }

    public function test_index_page_is_visible(): void
    {
        $this->createData();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    public function test_current_book_is_visible(): void
    {
        $this->createData();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/books/1');

        $response->assertStatus(200);

        $response = $this->get('/books/1/read');

        $this->assertEquals($user->active_book_id, $this->getBook()->id);
    }

    public function test_subscription_change_is_work(): void
    {
        $this->createData();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $response = $this->get('/subscriptions/index');

        $response->assertStatus(200);

        $response = $this->get('/subscriptions/3/change');

        $response->assertRedirect('/subscriptions/index');

        $this->assertEquals(3, $user->subscription->subscription_type_id);
    }


}
