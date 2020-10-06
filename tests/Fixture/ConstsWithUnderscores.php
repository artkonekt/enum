<?php
/**
 * Contains the ConstsWithUnderscores class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-13
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class ConstsWithUnderscores extends Enum
{
    public const __DEFAULT   =  self::AT_HOME;

    public const WENT_FISHING = 'went fishing';
    public const AT_HOME      = '@home';
}
