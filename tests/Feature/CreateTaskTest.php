<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function an_admin_can_create_a_task()
    {
        $admin = Admin::factory()->create();

        $user = User::factory()->create();

        $formData = [
            'title' => 'New Task',
            'description' => 'Task description here',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id,
        ];

        $response = $this->actingAs($admin, 'admin')
            ->post(route('tasks.store'), $formData);

        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'description' => 'Task description here',
        ]);

        $response->assertRedirect(route('tasks.index'));
    }
    /** @test */
    public function a_guest_cannot_create_a_task()
    {
        $user = User::factory()->create();

        $formData = [
            'title' => 'Unauthorized Task',
            'description' => 'Should not be created',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => 1,
        ];

        $response = $this->post(route('tasks.store'), $formData);

        $this->assertDatabaseMissing('tasks', [
            'title' => 'Unauthorized Task',
        ]);

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function it_validates_task_creation()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $this->actingAs($user);

        $response = $this->post('/tasks', [
            'title' => '',
            'description' => '',
            'assigned_to_id' => '',
            'assigned_by_id' => '', 
        ]);

        $response->assertStatus(302); 
        $response->assertSessionHasErrors(['title', 'description', 'assigned_to_id']);
    }
}
