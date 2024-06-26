<?php

namespace Tests\Unit\Controllers;

use App\Models\Url;
use App\Models\Visit;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UrlRedirectControllerTest extends TestCase
{
    #[Test]
    #[Group('u-controller')]
    public function urlRedirection(): void
    {
        $url = Url::factory()->create();

        $response = $this->get(route('home').'/'.$url->keyword);
        $response->assertRedirect($url->destination)
            ->assertStatus((int) config('urlhub.redirect_status_code'));

        $this->assertCount(1, Visit::all());
    }
}
