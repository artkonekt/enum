<?php
/**
 * Contains the FallbackEnumTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-06-24
 *
 */

namespace Konekt\Enum\Tests;

use Konekt\Enum\Tests\Fixture\FallbackEnum;
use PHPUnit\Framework\TestCase;

class FallbackEnumTest extends TestCase
{
    /** @test */
    public function it_falls_back_to_the_default_value_if_static_variable_unknown_values_fallback_to_default_is_true()
    {
        $this->assertEquals(FallbackEnum::defaultValue(), FallbackEnum::create('bullshit')->value());
    }
}
