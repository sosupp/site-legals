<?php
namespace PySosu\SiteLegals\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use PySosu\SiteLegals\Tests\TestCase;
use PySosu\SiteLegals\Models\SiteLegal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateLegalTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_create_a_site_legal_resource()
    {
        $this->assertCount(0, SiteLegal::all());

        $author = User::factory()->create();

        
    }
}