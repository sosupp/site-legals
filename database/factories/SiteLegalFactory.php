<?php
namespace Pysosu\SiteLegals\Database\Factories;

use Illuminate\Support\Str;
use PySosu\SiteLegals\Tests\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteLegalFactory extends Factory
{
    protected $model = SiteLegal::class;

    public function definition()
    {
        $author = User::factory()->create();
        
        $page = $this->faker->unique()->randomElement(['privacy', 'imprint', 'about us', 'terms']);

        return [
            'author_id' => $author->id,
            'author_type' => get_class($author),
            'page_name' => $page,
            'slug' => Str::slug($page),
            'description' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}