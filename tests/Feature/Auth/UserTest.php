<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\Test\CreateData;
use Tests\TestCase;

class UserTest extends TestCase
{
   use RefreshDatabase;
   use CreateData;

   public function test_auth_user_can_access_profile_page(): void
   {
       $this->createUsualUser();

       $user = $this->getUsualUser();

       $this->actingAs($user);

       $this->get('/profile')
           ->assertSuccessful();
   }

   public function test_not_auth_user_cant_access_profile_page(): void
   {
       $this->createUsualUser();

       $this->get('/profile')
           ->assertRedirect('/login');
   }
}
