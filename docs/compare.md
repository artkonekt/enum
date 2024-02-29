# Comparing Enums

## The `equals()` Method

Comparing two enums can be done with the `equals()` method:

```php
class Rating extends \Konekt\Enum\Enum
{
    const ONE   = 1;
    const TWO   = 2;
    const THREE = 3;
}

$one = Rating::ONE();
$anotherOne = Rating::ONE();
$two = Rating::TWO();

var_dump($one->equals($anotherOne));
// bool(true)

var_dump($anotherOne->equals($one));
// bool(true)

var_dump($one->equals($two));
// bool(false)

var_dump(
    $two->equals(Rating::TWO())
);
// bool(true)
```

### Does Not Equal To

Many developers prefer to avoid using negative conditions in their code like:

```php
if (!$one->equals($two)) //...
```

thus the `notEquals()` method is available (since v2.2) for improved
code readability. It's simply just the negation of `equals()`.

In v4.2, the `doesNotEqualTo(EnumInterface $enum): bool` method has been added, which is equivalent to the `notEquals()` method,
but it only accepts `EnumInterface` as argument.

### Type Check

The `equals()` method does a type check so two different types of the same value won't be equal:

```php
class OneTwoThree extends \Konekt\Enum\Enum
{
    const ONE   = 1;
    const TWO   = 2;
    const THREE = 3;
}

class EinZweiDrei extends \Konekt\Enum\Enum
{
    const ONE   = 1;
    const TWO   = 2;
    const THREE = 3;
}

$one = new OneTwoThree(1);
$ein = new EinZweiDrei(1);

var_dump($one->equals($ein));
//bool(false)
```

#### Extended Types

In case you extend an enum, then two instances of them will be equal if they have the same value:

```php
class YesNo extends \Konekt\Enum\Enum
{
    const YES = 'yes';
    const NO  = 'no';
}

class YesNoCancel extends YesNo
{
    const CANCEL = 'cancel';
}

$yes  = YesNo::YES();
$yeah = YesNoCancel::YES(); 

var_dump($yes->equals($yeah));
// bool(true)

var_dump($yeah->equals($yes));
// bool(true)
```

## Magic Checkers

Enums support magic checker properties and methods:

```php
class Location extends \Konekt\Enum\Enum
{
    const AT_HOME    = 1;
    const AT_FISHING = 200;
}

$location = new Location(Location::AT_HOME);

// using magic property:
var_dump($location->is_at_home);
// bool(true)
var_dump($location->is_at_fishing);
// bool(false)

// using magic method:
var_dump($location->isAtHome());
// bool(true)
var_dump($location->isAtFishing());
// bool(false)
```

The magic checker **property format** is: `is_const_name` ie:

- The property begins with `is_`
- The part after `is_` has to be the const name in `snake_case` (all lowercase with underscore separators)

_Examples:_

```text
const ONE = 1           ==> is_one
const LUCKY_LUKE = 'll' ==> is_lucky_luke
```

The magic checker **method format** is: `isConstName()` ie:

- The method name begins with `is`
- The part after `is` has to be the const name in `StudlyCase`

_Examples:_

```text
const ONE = 1           ==> isOne()
const LUCKY_LUKE = 'll' ==> isLuckyLuke()
```

## The `isAnyOf()` and `isNoneOf()` Methods

> This is a v4.2+ feature

It is possible to check whether an enum "is any of" or "is none of" multiple enum instances:

```php
class Status extends \Konekt\Enum\Enum
{
    public const NEW = 'new';
    public const PENDING = 'pending';
    public const COMPLETE = 'complete';
    public const CANCELED = 'canceled';
}

$new = Status::NEW(); 
$new->isAnyOf(Status::PENDING(), Status::NEW());
// => true

$complete = Status::COMPLETE(); 
$complete->isNoneOf(Status::PENDING(), Status::NEW());
// => true

$canceled = Status::CANCELED();
$canceled->isAnyOf(Status::NEW(), Status::PENDING());
// => false

$pending = Status::PENDING();
$pending->isNoneOf(Status::PENDING(), Status::COMPLETE());
// => false
```

You can pass any number of arguments to the `isNoneOf()` and `isAnyOf()` methods,
but all of them have to be `EnumInterface` instances.

The methods will use the `equals()` method under the hood to compare the enums, so the same rules described above apply
here as well.

---

**Next**: [Labels &raquo;](labels.md)
