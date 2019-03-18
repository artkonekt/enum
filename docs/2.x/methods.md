# Methods

## Static Methods

### `choices()`

Returns an array of value => label pairs. Ready to pass to dropdowns.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
    
    protected static $labels = [
        self::FOO => 'I am foo',
        self::BAR => 'I am bar'
    ];
}

var_dump(FooBar::choices());
// [
//     "foo" => "I am foo",
//     "bar" => "I am bar"
// ]     
```

### `consts()`

Returns the array of consts (except for __DEFAULT) of the class.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const __DEFAULT = self::FOO;
    
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::consts());
// [ "FOO", "BAR" ]     
```

### `create()`

Factory method for creating instance.

For more details refer to the [Using Factory Method in Creating Enums](create.md#using-factory-method) section.

### `defaultValue()`

Returns the default value of the class. Equals to the `__DEFAULT` constant.

### `has()`

Returns whether the enum contains the given value.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::has('foo'));
// bool(true)

var_dump(FooBar::has('bar'));
// bool(true)

var_dump(FooBar::has('bazz'));
// bool(false)

var_dump(FooBar::has('BAR'));
// bool(false)
```

### `hasConst()`

Returns whether a const is present in the specific enum class.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::hasConst('FOO'));
// bool(true)

var_dump(FooBar::hasConst('BAR'));
// bool(true)

var_dump(FooBar::hasConst('BAZ'));
// bool(false)

var_dump(FooBar::hasConst('bar'));
// bool(false)
```

### `labels()`

Returns the array of labels.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
    
    protected static $labels = [
        self::FOO => 'I am foo',
        self::BAR => 'I am bar'
    ];
}

var_dump(FooBar::labels());
// [ "I am foo", "I am bar" ]     
```

### `reset()`

Clears static class metadata. Mainly useful in testing environments.

Next time the enum class gets used, the class will be rebooted.

### `toArray()`

Returns an associative array with const names as key and their corresponding values as value.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::toArray());
// [
//     "FOO" => "foo",
//     "BAR" => "bar"
// ]     
```

### `values()`

Returns the array of values.

```php
class FooBar extends \Konekt\Enum\Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}

var_dump(FooBar::toArray());
// [ "foo", "bar" ]     
```

## Instance Methods

### `equals()`

Checks if two enums are equal. Value and class are both matched. Value check is not type strict.

For detailed description read the [Comparing Enums](compare.md) section.

### `label()`

Returns the label (string to be displayed on UI) of an instance. It returns the value if no label was set.

For more details see the [Labels](labels.md) section.

### `notEquals()`

Checks if two enums are NOT equal. The opposite of equals.

For detailed description read the [Comparing Enums](compare.md) section.

### `value()`

Returns the value of the enum instance.

_Example:_
```php
class Progress extends \Konekt\Enum\Enum
{
    const ZERO        = 0;
    const IN_PROGRESS = 'in_progress';
    const DONE        = 'done';
}

$s = Progress::DONE();
var_dump($s->value());
// string(4) "done"

$z = Progress::ZERO();
var_dump($z->value());
// int(0)
```

### `__toString()`

Used by PHP when converting the object to string. It returns the label.

```php
class BazBoink extends \Konekt\Enum\Enum
{
    const BAZ   = 'baz';
    const BOINK = 'boink';
    
    protected static $labels = [
        self::BAZ   => 'This is a baz',
        self::BOINK => 'What a Boink!'
    ];
}

$boink = BazBoink::BOINK();
echo $boink;
// What a Boink!
```

---

**Next**: [Examples &raquo;](examples.md)
