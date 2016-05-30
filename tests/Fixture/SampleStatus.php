<?php
/**
 * Contains the SampleStatus.php class.
 *
 * @copyright   Copyright (c) 2016 Storm Storez Srl-D
 * @author      Attila Fulop
 * @license     Proprietary
 * @since       2016-05-30
 *
 */


namespace Konekt\Enum\Tests\Fixture;

use Konekt\Enum\Enum;

final class SampleStatus extends Enum
{
    const __default      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
}