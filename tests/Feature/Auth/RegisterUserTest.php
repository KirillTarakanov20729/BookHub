<?php

namespace Tests\Feature\Auth;


use App\Models\SubscriptionType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Traits\Test\CreateData;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;
    /**
     * A basic feature test example.
     */
    public function test_user_can_register(): void
    {
        $this->get('/register')
            ->assertSuccessful();

        SubscriptionType::factory(1)->create();

        $this->post('/register', [
            'name' => 'test',
            'email' => 'a@a.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agreement' => 'on'
        ])->assertRedirect('/books');
    }

    public function test_user_cant_register_if_passwords_dont_match(): void
    {
        $this->get('/register')
            ->assertSuccessful();

        $this->post('/register', [
            'name' => 'test',
            'email' => 'a@a.com',
            'password' => 'password',
            'password_confirmation' => 'password1',
            'agreement' => 'on'
        ])->assertRedirect('/register');
    }

}
