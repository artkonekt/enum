# Default Values

## Specifying Default Value

It is possible to define a default value on Enum classes, by setting the value of the `__default` constant:

```php
class MemberRank extends \Konekt\Enum\Enum
{
    const __default = self::NOVICE;
    
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

- read the class's `__default` constant,
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

var_dump(FooBar::__default);
// NULL
```

```php
class SpoinkBaz extends \Konekt\Enum\Enum
{
    const __default = self::SPOINK;
    
    const SPOINK = 'spoink';
    const BAZ    = 'baz';
}

var_dump(SpoinkBaz::defaultValue());
// string(6) "spoink"

var_dump(SpoinkBaz::__default);
// string(6) "spoink"
```
---

**Next**: [Nullable Enums &raquo;](nullables.md)