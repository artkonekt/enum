<?php
/**
 * Contains the SampleStatus class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */

namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

final class SampleStatus extends Enum
{
    public const __DEFAULT      = self::PLACED;

    public const PLACED         = 'placed';
    public const CONFIRMED      = 'confirmed';
    public const PROCESSING     = 'processing';
    public const COMPLETED      = 'completed';
}
