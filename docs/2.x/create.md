# Creating Enums

## Define Enum Type

An enum type is a class that extends the base Enum class and defines a set of constants:

```php
class Status extends \Konekt\Enum\Enum
{
    const __DEFAULT      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
}
```

There's no restriction on what constant values can be, so it can be string, numeric, bool, etc.

```php
class Rank extends Konekt\Enum\Enum
{
    const JUNIOR       = 1;
    const INTERMEDIATE = 10;
    const SENIOR       = 100;
}
```

## Creating Instances

Konekt Enum offers several ways to create enum instances.

### Using Plain Constructor

```php
// With plain constructor:
$placed = new Status('placed');
// or
$placed = new Status(Status::PLACED);
```
### Using Factory Method

The `create()` static factory method can also be used for creating enum objects:

```php
// With factory method:
$confirmed  = Status::create(Status::CONFIRMED);
$processing = Status::create('processing');
```

### Using Magic Constructor

The most terse variant is the use of the magic constructor, where you use one of the const names as static method call:

```php
$completed = Status::COMPLETED();
```

Instances are immutable.

**Next**: [Default Values &raquo;](defaults.md)