<?php

declare(strict_types=1);

/**
 * Contains the EnumInterface interface.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-06-07
 *
 */

namespace Konekt\Enum;

interface EnumInterface
{
    public function value(): mixed;

    public function label(): string;

    public static function values(): array;

    public static function labels(): array;

    public static function choices(): array;

    public static function defaultValue(): mixed;

    public static function create($value = null): static;
}
