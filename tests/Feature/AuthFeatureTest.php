<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_login_with_valid_credentials()
    {
        $admin = Admin::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/tasks'); 
        $this->assertAuthenticatedAs($admin);
    }

    /** @test */
    public function admin_can_logout()
    {
        $admin = Admin::factory()->create([
            'password' => Hash::make('password')
        ]);

        $this->actingAs($admin);

        $response = $this->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest(); 
    }
}
