# Upgrading Older Versions

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
