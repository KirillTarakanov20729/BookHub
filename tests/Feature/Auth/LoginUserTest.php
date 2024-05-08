<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Traits\Test\CreateData;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    use CreateData;

    public function test_user_can_login(): void
    {
        $this->get('/login')
            ->assertSuccessful();

        $this->createUsualUser();

        $user = $this->getUsualUser();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
            ->assertRedirect('/books');
    }

    public function test_user_cant_login_if_passwords_dont_match(): void
    {
        $this->get('/login')
            ->assertSuccessful();

        $this->createUsualUser();

        $user = $this->getUsualUser();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password1',
        ])
            ->assertRedirect('/login');
    }
}
