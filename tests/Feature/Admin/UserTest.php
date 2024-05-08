<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class UserTest extends TestCase
{
    use CreateData;
    use RefreshDatabase;

    public function test_users_index_page_displays_users(): void
    {
        $this->createAdminUser();

        $user = $this->getAdminUser();

        $this->actingAs($user);

        $response = $this->get('/admin/users');

        $response->assertSuccessful();

        $response->assertViewHas('users', function($collection) use ($user) {
            return $collection->contains($user);
        });
    }


    public function test_users_search_with_subs_type_id_works(): void
    {
        $this->createAdminUser();

        $admin_user = $this->getAdminUser();

        $this->createUsualUser();

        $this->createSecondUsualUser();

        $firstUser = $this->getUsualUser();

        $secondUser = $this->getSecondUsualUser();

        $this->actingAs($admin_user);

        $response = $this->get('/admin/users?subscription_type_id=3');

        $response->assertSuccessful();

        $response->assertViewHas('users', function($collection) use ($firstUser, $secondUser) {
            return $collection->contains($secondUser) && !$collection->contains($firstUser);
        });
    }


    public function test_users_search_with_name_works(): void
    {
        $this->createAdminUser();

        $admin_user = $this->getAdminUser();

        $this->createUsualUser();

        $this->createSecondUsualUser();

        $firstUser = $this->getUsualUser();

        $secondUser = $this->getSecondUsualUser();

        $this->actingAs($admin_user);

        $response = $this->get('/admin/users?name=test2');

        $response->assertSuccessful();

        $response->assertViewHas('users', function($collection) use ($firstUser, $secondUser) {
            return $collection->contains($secondUser) && !$collection->contains($firstUser);
        });
    }

    public function test_users_search_dont_works_with_wrong_name(): void
    {
        $this->createAdminUser();

        $admin_user = $this->getAdminUser();

        $this->createUsualUser();

        $this->createSecondUsualUser();

        $firstUser = $this->getUsualUser();

        $secondUser = $this->getSecondUsualUser();

        $this->actingAs($admin_user);

        $response = $this->get('/admin/users?name=test3');

        $response->assertSuccessful();

        $response->assertViewHas('users', function($collection) use ($firstUser, $secondUser) {
            return !$collection->contains($secondUser) && !$collection->contains($firstUser);
        });
    }

}
