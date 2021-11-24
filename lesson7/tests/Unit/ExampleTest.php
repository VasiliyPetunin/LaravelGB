<?php

namespace Tests\Unit;

use App\Models\Categories;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $news = new News(new Categories());
        $this->assertIsArray($news->getNews());
    }

    public function test_example5()
    {
        $news = new News(new Categories());
        $this->assertSee(5, true);
    }
}
