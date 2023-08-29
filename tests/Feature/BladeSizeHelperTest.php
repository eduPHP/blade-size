<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class BladeSizeHelperTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        View::getFinder()->setPaths([realpath(__DIR__.'/../resources/views')]);
    }

    /** @test */
    public function it_loads_the_icon_view_with_default_classes()
    {
        $html = Blade::render('<x-sample />');

        $this->assertStringContainsString('w-4 h-4', $html);
    }

    /** @test */
    public function it_loads_only_the_custom_classes_when_set()
    {
        $html = Blade::render('<x-sample class="w-10 h-10" />');

        $this->assertStringContainsString('w-10 h-10', $html);
    }

    /** @test */
    public function it_also_loads_the_merged_class_attributes()
    {
        $html = Blade::render('<x-sample class="w-10 h-10" />');

        $this->assertStringContainsString('stroke-current w-10 h-10', $html);

        $html = Blade::render('<x-sample />');

        $this->assertStringContainsString('stroke-current w-4 h-4', $html);
    }
}