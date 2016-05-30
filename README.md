# Enum

[![Latest Stable Version](https://poser.pugx.org/konekt/enum/version.png)](https://packagist.org/packages/konekt/enum)
[![Total Downloads](https://poser.pugx.org/konekt/enum/downloads.png)](https://packagist.org/packages/konekt/enum)
[![Open Source Love](https://badges.frapsoft.com/os/mit/mit.svg?v=102)](https://github.com/ellerbrock/open-source-badge/)

## PHP Enum Class

### Enum

Abstract class that enables creation of PHP enums. All you have to do is extend this class and define some constants.
Alternative implementation of the SplEnum class (as that is often not available on php installations)

Enum is an object with value from one of those constants (or from one of superclass if any).
There is also a __default constant that enables you to create an object without passing enum value.


#### Example

```php
namespace App\Order;

use Konekt\Enum\Enum;

final class Status extends Enum
{
    const __default      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
}
```

Model classes can use it as a standalone type, internally mapping to whatever the original type is:

```php
namespace App\Order;

class Order
{
    /* ... the order entity ... */
    
    /** @var  string */
    protected $status;
    
    /**
     * @return Status
     */
    protected function getStatus()
    {
        return new Status($this->status); 
    }
    
    public function setStatus(Status $status)
    {
        $this->status = $status->getValue();    
    }

}

```

From the client code perspective


```php

use App\Order\Status;
use App\Order\Order;

class OrderController
{
    
    public function createAction()
    {
        $order = new Order();
        $order->setStatus(Status::PLACED());
        $order->save();
    }
    
    public function confirmAction($order)
    {
        $order->setStatus(Status::CONFIRMED());
        $order->save();
    }
    
    public function processAction($order)
    {
        //Alternatively you can directly use the constructor as well:
        $status = new Status(Status::PROCESSING);
        $order->setStatus($status);
        $order->save();
    }

}
```

#### Method Examples

```php

use App\Order\Status;

//Using the shortcut/magic factory:
$completed = Status::COMPLETED();

echo $completed;
//outputs: 'completed'



//Using directly the constructor:
$confirmed = new Status(Status::CONFIRMED);

echo $confirmed;
//output: 'confirmed'



//creating with no explicit initial value
$status = new Status();

echo $status;
//output: 'placed'
//due to having a __default value set and magic __toString() method


echo $status->getValue();
//output: 'placed'

print_r($status->toArray());
//output:
//Array
//  (
//      [PLACED] => placed
//      [CONFIRMED] => confirmed
//      [PROCESSING] => processing
//      [COMPLETED] => completed
//  )

print_r(Status::toArray());
//output:
//Array
//  (
//      [PLACED] => placed
//      [CONFIRMED] => confirmed
//      [PROCESSING] => processing
//      [COMPLETED] => completed
//  )

print_r(Status::toArray(true));
//outputs the default value as well:
//Array
//  (
//      [__default] => placed
//      [PLACED] => placed
//      [CONFIRMED] => confirmed
//      [PROCESSING] => processing
//      [COMPLETED] => completed
//  )

echo Status::hasKey('PLACED') ? 'yes' : 'no';
//output: 'yes'

echo Status::hasKey('placed') ? 'yes' : 'no';
//output: 'no'

echo Status::hasValue('PLACED') ? 'yes' : 'no';
//output: 'no'

echo Status::hasValue('placed') ? 'yes' : 'no';
//output: 'yes'

//Using the equals() comparison

$placed = Status::PLACED();

echo $placed->equals($completed) ? 'yes' : 'no';
//output: 'no'

echo $placed->equals($status) ? 'yes' : 'no';
//output: 'no'

$placed2 = new Status(Status::PLACED);
echo $placed->equals($placed2) ? 'yes' : 'no';
//output: 'yes'


```

Original credits to Marian Suflaj, http://www.php4every1.com/scripts/php-enum/ *(it's not live anymore as of 2016-05-30)*

Inspirations have also been taken from: https://github.com/myclabs/php-enum