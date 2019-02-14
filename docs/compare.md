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

Many developers prefer to avoid using negative conditions in their code
like:

```php
if (!$one->equals($two)) //...
```

thus the `notEquals()` method is available (since v2.2) for improved
code readability. It's simply just the negation of `equals()`.

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
```
const ONE = 1           ==> is_one
const LUCKY_LUKE = 'll' ==> is_lucky_luke
```

The magic checker **method format** is: `isConstName()` ie:

- The method name begins with `is`
- The part after `is` has to be the const name in `StudlyCase`

_Examples:_
```
const ONE = 1           ==> isOne()
const LUCKY_LUKE = 'll' ==> isLuckyLuke()
```

---

**Next**: [Labels &raquo;](labels.md)
