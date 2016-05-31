<?php
/**
 * Contains the Abstract Enum Component Class
 *
 * @copyright   Copyright (c) 2012 Marijan Suflaj
 * @copyright   Copyright (c) 2013-2016 Attila Fulop
 * @author      Marijan Suflaj
 * @author      Attila Fulop
 * @license     MIT
 * @since       2013-09-23
 * @version     2016-05-30
 *
 */


namespace Konekt\Enum;


/**
 * Abstract class that enables creation of PHP enums. All you have to do is extend this class
 * and define some constants.
 *
 * Alternative implementation of the SplEnum class (as that is often not
 * available on php installations)
 *
 * Enum is an object with value from one of those constants (or from one of superclass if any).
 * There is also a __default constant that enables you to create an object without passing enum value.
 *
 * @author     Marijan Suflaj
 * @link       http://php4every1.com
 * @see http://php.net/manual/en/class.splenum.php
 * @see http://www.php4every1.com/scripts/php-enum/
 */
abstract class Enum
{

    /** Constant with default value for creating enum object */
    const __default = null;

    /** @var mixed|null  */
    protected $value;

    /** @var bool Whether or not in strict mode */
    private $strict;

    private static $constants = [];


    /**
     * Returns the key value pair array of all defined constants in enum class.
     *
     * @param   bool     $includeDefault      If true, default value is included into return
     *
     * @return  array    Array with constant values
     */
    public static function toArray($includeDefault = false)
    {

        $class = static::class;

        if (!array_key_exists($class, self::$constants)) {
            self::populateConstants();
        }

        $result = self::$constants[$class];
        if (!$includeDefault && array_key_exists('__default', $result)) {
            unset($result['__default']);
        }

        return $result;
    }


    /**
     * Returns whether a certain value is within the predefined constants
     *
     * @param   mixed   $value      The scalar value (string, int, etc) that should be checked
     *
     * @return  bool    Returns true if the given valie is among the class's constants
     */
    public static function hasValue($value)
    {
        return in_array($value, static::toArray(), true);
    }

    /**
     * Returns whether a key (const name) is present in the specific enum class
     *
     * @param   string  $key    The name of the key (const)
     *
     * @return bool
     */
    public static function hasKey($key)
    {
        return array_key_exists($key, static::toArray());
    }

    /**
     * Magic constructor to be used like: FancyEnum::SHINY_VALUE() where the method name is a valid const value of the class
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return static
     * @throws \BadMethodCallException
     */
    public static function __callStatic($name, $arguments)
    {
        if (self::hasKey($name)) {
            return new static(self::getValueByKey($name));
        }

        throw new \BadMethodCallException(sprintf("No such value (`%s`) or static method in this class %s", $name, static::class));
    }

    /**
     * Creates new enum object. If child class overrides __construct(),
     * it is required to call parent::__construct() in order for this
     * class to work as expected.
     *
     * @param   mixed    $initialValue     Any value that is exists in defined constants
     * @param   bool     $strict           If set to true, type and value must be equal
     *
     * @throws  \UnexpectedValueException   If value is not valid enum value
     */
    public function __construct($initialValue = null, $strict = true)
    {

        $class = get_class($this);

        if (!array_key_exists($class, self::$constants)) {
            self::populateConstants();
        }

        if (null === $initialValue) {
            $initialValue = self::$constants[$class]["__default"];
        }

        $temp = self::$constants[$class];

        if (!in_array($initialValue, $temp, $strict)) {
            throw new \UnexpectedValueException(sprintf("Given value (%s) is not in enum `%s`", $initialValue, $class));
        }

        $this->value   = $initialValue;
        $this->strict  = $strict;
    }


    /**
     * Returns the value of the object
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns string representation of an enum. Defaults to the value casted to string.
     *
     * @return  string      String representation of this enum's value
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * Checks if two enums are equal. Only value is checked, not class type also.
     * If enum was created with $strict = true, then strict comparison applies here also.
     *
     * @param   mixed   $object
     *
     * @return  bool     True if enums are equal
     */
    public function equals($object)
    {
        if (!($object instanceof Enum)) {
            return false;
        }

        return $this->strict ? ($this->value === $object->value) : ($this->value == $object->value);
    }

    /**
     * Initializes the constants array based on the constants defined in the concrete class
     */
    private static function populateConstants()
    {
        $class = static::class;

        $r = new \ReflectionClass($class);
        $constants = $r->getConstants();

        self::$constants = array($class => $constants);
    }

    /**
     * Returns a value assigned to a key (const name)
     *
     * @param string    $key    The name of the const (key)
     *
     * @return mixed    The value assigned to the const, NULL if not found
     */
    private static function getValueByKey($key)
    {
        $arr = static::toArray(true);

        return array_key_exists($key, $arr) ? $arr[$key] : NULL;
    }

}
