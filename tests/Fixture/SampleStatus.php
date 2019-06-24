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
    const __DEFAULT      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
}
