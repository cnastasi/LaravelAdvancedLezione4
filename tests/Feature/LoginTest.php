<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\JWTAuth;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var JWTAuth|MockInterface
     */
    private $auth;

    public function setUp()
    {
        parent::setUp();

        $this->seed('TestingDatabaseSeeder');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginOk()
    {
        $data = [
            'email'    => 'christian@email.it',
            'password' => 'password'
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);

        $token = $response->decodeResponseJson()['token'];

        return $token;
    }

    /**
     * @param string $token
     *
     * @depends testLoginOk
     */
    public function testShowInfo(string $token)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];

        $response = $this->get('api/profile/1', $headers);

        $response->assertStatus(200);

        $response->assertJson([
            'id'    => 1,
            'name'  => 'Christian',
            'email' => 'christian@email.it',
            'age'   => 18
        ]);
    }


    /**
     * @return \Mockery\MockInterface|JWTAuth
     */
    private function mockJwtAuth(): JWTAuth
    {
        $mock = \Mockery::mock(JWTAuth::class);
vediamo che succede se scrivo qualcosa
        return $mock;
    }
}
