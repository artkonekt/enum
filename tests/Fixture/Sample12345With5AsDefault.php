<?php
/**
 * Contains the Sample12345With5AsDefault class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-26
 *
 */


namespace Konekt\Enum\Tests\Fixture;

class Sample12345With5AsDefault extends Sample1234
{
    const __default = self::FIVE;

    const FIVE      = 5;
}
