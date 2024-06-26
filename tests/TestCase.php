<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Support\Auth;
use Tests\Support\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use Auth, CreatesApplication;
    use RefreshDatabase;
}
