# Examples

## As Value Object

Other classes can enums as value objects, internally mapping them to whatever the original type is.

**Enum Class Example:**

```php
namespace App\Order;

class Status extends \Konekt\Enum\Enum
{
    const __DEFAULT      = self::PLACED;

    const PLACED         = 'placed';
    const CONFIRMED      = 'confirmed';
    const PROCESSING     = 'processing';
    const COMPLETED      = 'completed';
}
```

**Using As Value Object:**

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
        $this->status = $status->value();    
    }

}
```

**From the client code perspective:**

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

## Method Examples

```php
// For the Enum definition see the example above
use App\Order\Status;

//Using the shortcut/magic factory:
$completed = Status::COMPLETED();

echo $completed;
//outputs: 'Completed'

echo $completed->value();
//outputs: 'completed'

//Using directly the constructor:
$confirmed = new Status(Status::CONFIRMED);

echo $confirmed;
//output: 'Confirmed'

echo $confirmed->value();
//output: 'confirmed'

//creating with no explicit initial value
$status = new Status();

echo $status;
//output: 'Placed'
//due to having a __DEFAULT value set and magic __toString() method


echo $status->value();
//output: 'placed'

echo Status::defaultValue();
//output 'placed'

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

print_r(Status::choices());
//Array
//(
//    [placed]     => 'Placed'
//    [confirmed]  => 'Confirmed'
//    [processing] => 'Processing'
//    [completed]  => 'Completed'
//)

echo Status::hasConst('PLACED') ? 'yes' : 'no';
//output: 'yes'

echo Status::hasConst('placed') ? 'yes' : 'no';
//output: 'no'

echo Status::has('PLACED') ? 'yes' : 'no';
//output: 'no'

echo Status::has('placed') ? 'yes' : 'no';
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

// Magic checker/comparison

$status = Status::CONFIRMED();
var_dump($status->isConfirmed());
// bool(true)
var_dump($status->is_confirmed);
// bool(true)

var_dump($status->isPlaced());
// bool(false)
var_dump($status->is_placed);
// bool(false)
```

---

Congrats, you've reached the end of this doc! 🎉