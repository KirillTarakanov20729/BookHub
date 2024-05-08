<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;

    public function test_usual_user_cant_access_admin_page(): void
    {
        $this->createUsualUser();

        $user = $this->getUsualUser();

        $this->actingAs($user);

        $this->get('/admin')
            ->assertStatus(404);

        $this->get('/admin/authors')
            ->assertStatus(404);

        $this->get('/admin/genres')
            ->assertStatus(404);

        $this->get('/admin/publishers')
            ->assertStatus(404);
    }

    public function test_admin_can_access_admin_page(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $this->get('/admin')
            ->assertSuccessful();
    }





}
