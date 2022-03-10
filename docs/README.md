# Konekt Enum Documentation

> **Why not PHP 8.1 Enums?** This package was created back in 2013, and has been in use across many libraries.
> We're planning to find the way to make this package be based on native PHP enums AND keep compatibility
> with earlier versions as much as possible. This is expected in the **v5.0** release.

## What's An Enum?

Enums are handy when a variable (especially a method parameter) can only take one out of a small set of possible values.

Examples would be things like type constants (contract status: “permanent”, “temp”, “apprentice”), or flags (“execute now”, “defer execution”).

## Konekt Enum

Konekt `Enum` is PHP enum implementation.

It consists of an abstract class that enables creation of PHP enums. All you have to do is extend this class and define some constants.

**Quick Example:**

```php
class Status extends \Konekt\Enum\Enum {
    const PENDING     = 'pending';
    const IN_PROGRESS = 'in progress';
    const COMPLETE    = 'complete';
    const FAILED      = 'failed';
}
```

Enum is an object with value from one of those constants (or from one of superclass if any).

There is also a `__DEFAULT` constant that enables you to create an object without passing enum value.

> **Note**: It is an alternative implementation of the [SplEnum class](http://php.net/manual/en/class.splenum.php), as that is often not available on PHP installations.

---

**Next**: [Installation &raquo;](installation.md)


