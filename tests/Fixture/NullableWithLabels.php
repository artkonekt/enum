<?php
/**
 * Contains the NullableWithLabels class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-26
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

class NullableWithLabels extends Enum
{
    const __DEFAULT   = self::UNDEFINED;

    const UNDEFINED = null;
    const OPEN      = 'open';
    const PROGRESS  = 'progress';
    const DONE      = 'done';

    protected static $labels = [
        self::UNDEFINED => 'Undefined',
        self::OPEN      => 'Open',
        self::PROGRESS  => 'In progress',
        self::DONE      => 'Done',
    ];
}
