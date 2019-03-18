# Labels

Enum labels are strings for specific values, and are intended to be used to display an enum to the end users.

Labels are optional.

> Labels were called "display texts" in v1.x of this library.

## Setting Labels

Labels can be defined via the static `$labels` property on the concrete enum class.

!> Be aware that the **`$labels` property MUST BE DECLARED AS STATIC** otherwise it won't work.

It has to be an array containing enum values as keys and user friendly texts a values:

```php
class OrderStatus extends \Konekt\Enum\Enum
{
    const __DEFAULT      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
    
    /** @var array Labels are optional */
    protected static $labels = [
        self::PLACED     => 'Placed',
        self::CONFIRMED  => 'Confirmed',
        self::PROCESSING => 'Processing',
        self::COMPLETED  => 'Completed'    
    ];
}

$completed = OrderStatus::COMPLETED();
// Retrieve the label with the label() method
echo $completed->label();
// 'Completed'
```

## Setting Labels In Runtime

If it's necessary to set the labels runtime with some function (eg. translate with `__()`) then it can be done within a custom `boot()` method.

*Example: returning translated display text with gettext:*

```php
final class OffsitePaymentMethod extends \Konekt\Enum\Enum
{
    const __DEFAULT = self::WIRE_TRANSFER;

    const WIRE_TRANSFER     = 'wire_transfer';
    const CASH              = 'cash';
    const POS               = 'pos';
    const CASH_ON_DELIVERY  = 'cash_on_delivery';
    
    // $labels static property needs to be defined
    public static $labels = [];
    
    protected static function boot()
        {
            static::$labels = [
                self::WIRE_TRANSFER     => __('Wire Transfer'),
                self::CASH              => __('Cash'),
                self::POS               => __('Pos terminal'),
                self::CASH_ON_DELIVERY  => __('Cash on delivery')
            ];
        }
}
```

## Methods For Accessing Labels

1. `static::choices()`
2. `$instance->label()`

#### The `label()` Method

The `label()` method returns the label for a specific instance value. If no label was set via the `$labels` property, defaults to the enum value:

```php
final class BarType extends \Konekt\Enum\Enum
{
    const CREATED        = 'created';
    const ACTIVE         = 'active';
    const CLOSED         = 'closed';
    
    protected static $labels = [
        self::CREATED    => 'New Bar',
        self::ACTIVE     => 'Ongoing Bar'  
    ];
}

$created = BarType::CREATED();
echo $created->label();
//outputs: 'New Bar'

$active = BarType::ACTIVE();
echo $active->label();
//outputs: 'Ongoing Bar'

$closed = BarType::CLOSED();
echo $closed->label();
//outputs: 'closed' -> fallback to enum value since no label was set
```

#### The `choices()` Method

The `choices()` method returns all the available values along with their display texts. Useful for selects/dropdowns:

```php
final class BarType extends Enum
{
    const CREATED        = 'created';
    const ACTIVE         = 'active';
    const CLOSED         = 'closed';
    
    protected static $labels = [
        self::CREATED    => 'New Bar',
        self::ACTIVE     => 'Ongoing Bar'  
    ];
}

print_r(BarType::choices());
//Outputs:
//Array
//(
//    [created] => 'New Bar'
//    [active]  => 'Ongoing Bar'
//    [closed]  => 'closed'
//)
```

---

**Next**: [Methods &raquo;](methods.md)