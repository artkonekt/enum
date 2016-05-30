<?php
/**
 * Contains the BasicTest.php class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-05-30
 *
 */


namespace Konekt\Enum\Tests;


class BasicTest extends \PHPUnit_Framework_TestCase
{
    const MIN_PHP_VERSION = '5.5.9';

    /**
     * Very Basic smoke test case for testing against parse errors, etc
     */
    public function testSmoke()
    {
        $this->assertTrue(true);
    }

    /**
     * Test for minimum PHP version
     *
     * @depends testSmoke
     */
    public function testPhpVersion()
    {
        $this->assertFalse(version_compare(PHP_VERSION, self::MIN_PHP_VERSION, '<'),
            'PHP version ' . self::MIN_PHP_VERSION . ' or greater is required but only '
            . PHP_VERSION . ' found.');
    }

}