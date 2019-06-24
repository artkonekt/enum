# Konekt Enum

[![Travis Build Status](https://img.shields.io/travis/artkonekt/enum.svg?style=flat-square)](https://travis-ci.org/artkonekt/enum)
[![Packagist Stable Version](https://img.shields.io/packagist/v/konekt/enum.svg?style=flat-square&label=stable)](https://packagist.org/packages/konekt/enum)
[![Packagist downloads](https://img.shields.io/packagist/dt/konekt/enum.svg?style=flat-square)](https://packagist.org/packages/konekt/enum)
[![StyleCI](https://styleci.io/repos/60036504/shield?branch=master)](https://styleci.io/repos/60036504)
[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)

## PHP Enum Class

> Enums are handy when a variable (especially a method parameter) can only take one out of a small set of possible values.

Konekt Enum is a lightweight abstract class that enables creation of PHP enums.

### Usage

Extend the base class and define constants on it:

##### Example

```php
class ChessPiece extends \Konekt\Enum\Enum {
    const KING   = 'king';
    const QUEEN  = 'queen';
    const ROOK   = 'rook';
    const BISHOP = 'bishop';
    const KNIGHT = 'knight';
    const PAWN   = 'pawn';
}

var $queen = new ChessPiece('queen');
```

## Installation

using composer: `composer require konekt/enum`

## Documentation

For detailed usage and examples go to the
[Konekt Enum Documentation](https://konekt.dev/enum) or refer to the
markdown files in the `docs/` folder of this repo.

For the list of changes read the [Changelog](Changelog.md).

## Upgrade

From 1.x -> 2.x see [Upgrade to 2.0](https://konekt.dev/enum/3.0/upgrade#from-v1-to-v2)

From 2.x -> 3.x see [Upgrade to 3.0](https://konekt.dev/enum/3.0/upgrade#from-v2-to-v3)

## Laravel Eloquent Integration

There is a tiny trait for Laravel that helps you to automatically map fields of Eloquent models to/from Enum objects. For more details go to the [konekt/enum-eloquent](https://github.com/artkonekt/enum-eloquent) package.

