<?php

namespace Tests\Unit;

use Database\Factories\UserFactory;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A fail login attempt unit test example.
     *
     * @return void
     */
    public function test_login_attempt_for_wrong_credentials()
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@test.com',
            'password' => "iamwrongpassword"
        ]);

        $response->assertStatus(401);

    }

    /**
     * A success login attempt unit test example.
     *
     * @return void
     */
    public function test_login_attempt_with_success()
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@test.com',
            'password' => "123456"
        ]);

        $response->assertStatus(200);

    }
}
