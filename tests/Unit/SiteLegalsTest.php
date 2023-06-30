<?php
namespace PySosu\SiteLegals\Tests\Unit;

use PySosu\SiteLegals\Tests\User;
use PySosu\SiteLegals\Tests\TestCase;
use PySosu\SiteLegals\Models\SiteLegal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteLegalsTest extends TestCase
{
    use RefreshDatabase;

    // public function test_site_legal_resource_has_page_name()
    // {
    //     $page = SiteLegal::factory()->create([
    //         'page_name' => 'fake page name'
    //     ]);

    //     $this->assertEquals('fake page name', $page->page_name);

    // }

    public function test_a_site_legal_resource_belongs_to_an_author()
    {
        $author = User::factory()->create();

        $author->site_legals()->create([
            'page_name' => 'About Us',
            'slug' => 'about-us',
            'content' => 'read more about us',
        ]);


        $this->assertCount(1, SiteLegal::all());
        $this->assertTrue(true);
        
    }

}