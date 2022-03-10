# Upgrading Older Versions

## From v3 To v4

### PHP 8.0+

First, Enum v4 requires PHP 8.0 or later to run. Earlier PHP versions are not supported.

### Strict Type Checking

The most important difference between 4.0 and 3.X versions is that
**All the values** of the enums **are not strictly typed**.

In earlier versions you could do this:

```php
class OrderStatus extends \Konekt\Enum\Enum {
    public const ORDERED = 1;
    public const SHIPPED = 2;
    public const CANCELLED = -1;
}

$shipped = new OrderStatus('1'); // Note that a string was passed;
```

Beginning with v4.0, this will throw an `UnexpectedValueException`.
It means that you always need to pass the value of the original type to the constructor.

The same applies to the `create()` method:

```php
// In v4:
OrderStatus::create('1');
// throws an UnexpectedValueException
```

### Handling of Null Values

#### Null Is No Longer Zero

As a consequence of strict type checking, you can distinguish between
`0` and `null` values:

```php
class TriState extends \Konekt\Enum\Enum {
    public const __DEFAULT = self::ANY;
    public const ANY = NULL;
    public const CHECKED = 1;
    public const UNCHECKED = 0;
}
```

In Enum v3 and earlier versions this was not working properly,
`TriState::create(0)` resulted in `Tristate::ANY()` and not `Tristate::UNCHECKED()`

#### Null As Non-Default

In Enum v3 and earlier, if you created an Enum with a `null` value, it only worked
well if it was either the default or if there was no other default.

Beginning with v4, you can define enums with `null` values AND specify another default:

```php
class MatchingPattern extends \Konekt\Enum\Enum {
    public const __DEFAULT = self::INCLUDE;
    public const IGNORE = null;
    public const INCLUDE = 'include';
    public const EXCLUDE = 'exclude';
}
```

### Return, Argument and Attribute Types

Besides type strictness, the entire base class has been updated to use
type definitions on all methods, arguments and class members.

As a consequence, you need to specify the corresponding types in
your enum classes on any property or method that you have overwritten
from the base Enum class.

As an example if you're using fallback enums, then you have to add
the `bool` type specifier to your enum class:

```php
class YourEnum extends \Konekt\Enum\Enum {
    // This worked with v2.3 and 3.x:
    protected static $unknownValuesFallbackToDefault = true;
    // In v4, you must specify the type (bool):
    protected static bool $unknownValuesFallbackToDefault = true;
}
```

## From v2 To v3

The most important difference between 3.0 and 2.X versions:

The `__default` const is now uppercase `__DEFAULT` in order to fully comply with the PSR-1
standard.

This is a **BC** so if you want to use version 3.0, you have to check your codebase for enums that
have `__default` constants defined and rename them to `__DEFAULT`.

If you don't want to do this, you can **safely keep using the 2.x versions**.

## From v1 To v2

### Renamed Methods

- `getValue()` -> `value()`
- `getDisplayText()` -> `label()`
- `hasValue()` -> `has()`
- `hasKey()` -> `hasConst()`

### Consistent Naming

In order to be more straightforward, the following naming changes have been done:

- 'Display text' has become 'label'
- 'Key' has become 'const'
- 'Values' is intact

### Removed Features

- strict comparison (`===`) has been removed (is always `==`)
- `toArray()` never returns the '__default' key.

### Null Values Must Be Explicit

It's not possible to have enums without values any more.

If you want to have a `null` value it is possible by explicitly setting one of the values to NULL:

```php
class Progress extends \Konekt\Enum\Enum
{
    const UNKNOWN     = null;
    const INITIALIZED = 1;
    const COMPLETED   = 2;
}
```

Then you can have a null value:

```php

$unknown = Progress::create();
var_dump($unknown->value());
// output: NULL

```

### New Static Methods

- `values()`: returns all the values as an array.
- `labels()`: returns the labels (with fallback to values if no label defined). Elements are always strings.
- `consts()`: returns the const names in an array.
- `create($value)`: factory method for creating an instance with value
- `reset()`: Clears static class metadata
- `defaultValue()`: static method to return the value of the class (__default const or null if unset)

**Next**: [Creating Enums &raquo;](create.md)
