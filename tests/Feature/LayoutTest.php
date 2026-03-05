<?php

namespace Tests\Feature;

use Tests\TestCase;

class LayoutTest extends TestCase
{
    /** @test */
    public function it_has_a_title_tag()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->dump();
        $response->assertSee('<title>');
        $response->assertSee('Infrastruktur TI - Dinas Kominfo Sijunjung');
    }

    /** @test */
    public function it_has_optimized_bunny_fonts()
    {
        $response = $this->get('/');
        $response->assertSee('fonts.bunny.net/css?family=inter:400,500,600,700&display=swap');
    }

    /** @test */
    public function it_has_deferred_scripts()
    {
        $response = $this->get('/');
        $response->assertSee('src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer');
        $response->assertSee('src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer');
        $response->assertSee('src="https://www.google.com/recaptcha/api.js" defer');
    }

    /** @test */
    public function it_has_aria_label_on_login_link()
    {
        $response = $this->get('/');
        $response->assertSee('aria-label="Masuk"');
    }
}
