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
    public const __DEFAULT   = self::UNDEFINED;

    public const UNDEFINED = null;
    public const OPEN      = 'open';
    public const PROGRESS  = 'progress';
    public const DONE      = 'done';

    protected static $labels = [
        self::UNDEFINED => 'Undefined',
        self::OPEN      => 'Open',
        self::PROGRESS  => 'In progress',
        self::DONE      => 'Done',
    ];
}
