# Nullable Enums

In certain circumstances it's useful to have enums that can have a null value. Usually this null value is also the default, however this is not mandatory.

This can be done by explicitly defining a constant that has a null value:

**Example:**

```php
class Gender extends \Konekt\Enum\Enum
{
    const __DEFAULT = self::UNKNOWN;
    
    const UNKNOWN = null;
    const MALE    = 'm';
    const FEMALE  = 'f';
}

$gender = new Gender();
var_dump($gender->value());
// NULL

$unknown = Gender::UNKNOWN();
var_dump($unknown->value());
// NULL
```

---

**Next**: [Comparing Enums &raquo;](compare.md)