# Default Values

## Specifying Default Value

It is possible to define a default value on Enum classes, by setting the value of the `__DEFAULT` constant:

```php
class MemberRank extends \Konekt\Enum\Enum
{
    const __DEFAULT = self::NOVICE;
    
    const NOVICE  = 'novice';
    const SENIOR  = 'senior';
    const VETERAN = 'veteran';
    const MASTER  = 'master';
    const LEGEND  = 'legend';
}
```

In case you omit passing a value when creating an enum instance then the object will have the default value:

**with plain constructor:**
```php
$rank = new MemberRank();

echo $rank->value();
// output: 'novice'
```

**with factory method:**
```php
$rank = MemberRank::create();

echo $rank->value();
// output: 'novice'
```
## No Default Value

If you don't set an explicit default value, then it is not possible to create an enum object without setting the value:

```php
class ChessColor extends \Konekt\Enum\Enum
{
    const WHITE = 'white';
    const BLACK = 'black';
}

new ChessColor();
// throws: UnexpectedValueException: Given value () is not in enum `ChessColor`

ChessColor::create();
// throws: UnexpectedValueException: Given value () is not in enum `ChessColor`
```

## Obtaining The Default Value

In case you need to obtain the default value of an Enum class, there are two ways to do so:

- read the class's `__DEFAULT` constant,
- use the static `defaultValue()` method.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::defaultValue());
// NULL
// since BarType has no default

var_dump(FooBar::__DEFAULT);
// NULL
```

```php
class SpoinkBaz extends \Konekt\Enum\Enum
{
    const __DEFAULT = self::SPOINK;
    
    const SPOINK = 'spoink';
    const BAZ    = 'baz';
}

var_dump(SpoinkBaz::defaultValue());
// string(6) "spoink"

var_dump(SpoinkBaz::__DEFAULT);
// string(6) "spoink"
```

## Fallback To Default Value

> This is a v3.0 feature

It is possible to define the behavior for an enum so that if it receives
a value that is not one of the predefined values, it falls back to the
default instead of throwing an exception.

This can be done by setting the **static** variable
`$unknownValuesFallbackToDefault` to true:

```php
class FallbackEnum extends \Konekt\Enum\Enum
{
    const __DEFAULT  = self::UNKNOWN;
    const UNKNOWN    = null;
    const SOME_VALUE = 'some_value';
    const GOOD_VALUE = 'good_value';

    protected static $unknownValuesFallbackToDefault = true;
}

var_dump(FallbackEnum::create('bullshit_value'));
//class FallbackEnum#1 (1) {
//  protected $value =>
//  NULL
//}
```

!> Make sure to define `$unknownValuesFallbackToDefault` as **static** variable!

---

**Next**: [Nullable Enums &raquo;](nullables.md)
