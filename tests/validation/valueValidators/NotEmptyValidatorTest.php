<?php
namespace belanur\validation\tests;

use belanur\validation\NotEmptyValidator;

class NotEmptyValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @testdox isValid() returns TRUE if value is not empty
     * @dataProvider validValueProvider
     */
    public function testIsValidReturnsTrue($value)
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->isValid($value));
    }


    /**
     * @testdox isValid() returns FALSE if value is empty
     * @dataProvider invalidValueProvider
     */
    public function testIsValidReturnsFalse($value)
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->isValid($value));
    }

    public static function validValueProvider()
    {
        return array(
            array('foo'),
            array('bar'),
            array(0)
        );
    }

    public static function invalidValueProvider()
    {
        return array(
            array(''),
            array(NULL)
        );
    }

}
