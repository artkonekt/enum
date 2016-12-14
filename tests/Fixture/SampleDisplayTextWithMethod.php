<?php
/**
 * Contains the SampleDisplayTextWithMethod class.
 *
 * @copyright   Copyright (c) Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-14
 *
 */


namespace Konekt\Enum\Tests\Fixture;


use Konekt\Enum\Enum;

class SampleDisplayTextWithMethod extends Enum
{
    const FOO   = 'foo';
    const BAR   = 'bar';
    const BAZ   = 'baz';

    protected function fetchDisplayText($value)
    {
        switch ($value) {
            case self::FOO:
                return 'Foo is good';
                break;
            case self::BAR:
                return 'Bar is better';
                break;
            case self::BAZ:
                return 'Baz is best';
                break;
            default:
                return 'Foo Bar Baz';
        }
    }

}