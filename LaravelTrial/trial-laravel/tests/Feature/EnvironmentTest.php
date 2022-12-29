<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
  final public function testGetEnvironment(): void
  {
      $youtube = env('YOUTUBE');

      self::assertEquals('SaraNgoding', $youtube);
  }
}
