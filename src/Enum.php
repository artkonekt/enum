<?php
/**
 * Contains the Enum Class
 *
 * @copyright   Copyright (c) 2013-2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2013-09-23
 */


namespace Konekt\Enum;


/**
 * Abstract class that enables creation of PHP enums.
 *
 * All you have to do is extend this class and define some constants.
 */
abstract class Enum
{
    /** Constant with default value for creating enum object */
    const __default = null;

    /** @var mixed|null  */
    protected $value;

    protected static $labels = [];

    private static $meta = [];

    /**
     * Class constructor
     *
     * @param   mixed    $value     Any defined value
     *
     * @throws  \UnexpectedValueException   If value is not valid enum value
     */
    public function __construct($value = null)
    {
        self::bootClass();

        if (is_null($value)) {
            $value = static::__default;
        }

        if (!static::has($value)) {
            throw new \UnexpectedValueException(
                sprintf("Given value (%s) is not in enum `%s`",
                    $value, static::class
                )
            );
        }

        //trick below is needed to make sure the value of original type gets set
        $this->value = static::values()[array_search($value, static::values())];
    }

    /**
     * Returns the value of the enum instance
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Returns the label (string to be displayed on UI) of a value
     *
     * @return string
     */
    public function label()
    {
        $result = $this->value;
        if (isset(static::$labels[$result])) {
            $result = static::$labels[$result];
        }

        return (string) $result;
    }

    /**
     * Checks if two enums are equal. Value and class are both matched.
     * Value check is not type strict.
     *
     * @param   mixed    $object
     *
     * @return  bool     True if enums are equal
     */
    public function equals($object)
    {
        if ( ! ($object instanceof Enum) || ! self::compatibles(get_class($object), static::class)) {
            return false;
        }

        return $this->value() == $object->value();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->label();
    }

    /**
     * Magic constructor to be used like: FancyEnum::SHINY_VALUE() where the method name is a const of the class
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return static
     * @throws \BadMethodCallException
     */
    public static function __callStatic($name, $arguments)
    {
        if (self::hasConst($name)) {
            return new static(constant(static::class . '::' . $name));
        }

        throw new \BadMethodCallException(
            sprintf("No such value (`%s`) or static method in this class %s",
                $name, static::class
            )
        );
    }

    /**
     * Factory method for creating instance
     *
     * @param mixed|null $value  The value for the instance
     *
     * @return static
     */
    public static function create($value = null)
    {
        return new static($value);
    }

    /**
     * Returns whether a const is present in the specific enum class
     *
     * @param   string  $const
     *
     * @return bool
     */
    public static function hasConst($const)
    {
        return in_array($const, static::consts());
    }

    /**
     * Returns the consts (except for __default) of the class
     *
     * @return array
     */
    public static function consts()
    {
        self::bootClass();

        return array_keys(self::$meta[static::class]);
    }

    /**
     * Returns whether the enum contains the given value
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function has($value)
    {
        return in_array($value, static::values());
    }

    /**
     * Returns the array of values
     *
     * @return array
     */
    public static function values()
    {
        self::bootClass();

        return array_values(self::$meta[static::class]);
    }

    /**
     * Returns the array of labels
     *
     * @return array
     */
    public static function labels()
    {
        self::bootClass();

        $result = [];

        foreach (static::values() as $value) {
            $result[] = isset(static::$labels[$value]) ? (string) static::$labels[$value] : (string) $value;
        }

        return $result;
    }

    /**
     * Initializes the constants array for the class if necessary
     */
    private static function bootClass()
    {
        if (!array_key_exists(static::class, self::$meta)) {
            self::$meta[static::class] = (new \ReflectionClass(static::class))->getConstants();
            unset(self::$meta[static::class]['__default']);

            if (method_exists(static::class, 'boot')) {
                static::boot();
            }

        }
    }

    /**
     * Returns whether two enum classes are compatible (are the same type or one descends from the other)
     *
     * @param string    $class1
     * @param string    $class2
     *
     * @return bool
     */
    private static function compatibles($class1, $class2)
    {
        if ($class1 == $class2) {
            return true;
        } elseif (is_subclass_of($class1, $class2)) {
            return true;
        } elseif (is_subclass_of($class2, $class1)) {
            return true;
        }

        return false;
    }


}
