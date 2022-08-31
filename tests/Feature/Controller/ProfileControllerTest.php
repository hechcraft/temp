<?php

namespace Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class ProfileControllerTest extends FeatureTestCase
{
    public function test_user_has_access_profile_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('profile'));

        $response->assertViewIs('user.profile');
    }

    public function test_guest_does_not_have_access_to_the_profile_page()
    {
        $response = $this->get(route('profile'));

        $response->assertRedirect(route('login'));
    }

    public function test_avatars_can_be_uploaded()
    {
        $user = User::factory()->create();

        Storage::fake();

        $file = UploadedFile::fake()->image('avatar.jpg');

        $this->actingAs($user)->put(route('profile.update'), [
            'avatar' => $file,
        ]);

        Storage::disk()->assertExists('avatar/'. $file->hashName());
    }

    public function test_user_name_update()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->put(route('profile.update'), [
            'name' => 'test1',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test1',
        ]);
    }

    public function test_user_email_update()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->put(route('profile.update'), [
            'email' => 'newemail@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'newemail@example.com',
        ]);
    }
}
