<?php
namespace belanur\validation\tests;

use belanur\validation\OptionalValidator;

class OptionalValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $_mockedValidator;

    public function setUp()
    {
        $this->_mockedValidator = $this->getMock('\belanur\validation\ValueValidatorInterface');
    }

    /**
     * @testdox isValid() returns TRUE if value is empty
     * @dataProvider emptyValueProvider
     */
    public function testIsValidReturnsTrueIfValueIsEmpty($value)
    {
        $validator = new OptionalValidator($this->_mockedValidator);
        $this->assertTrue($validator->isValid($value));
    }

    /**
     * @testdox isValid() returns the result from the injected validator
     * @dataProvider validatorResultProvider
     */
    public function testIsValidReturnsResultFromValidator($result)
    {
        $this->_mockedValidator->expects($this->once())
            ->method('isValid')
            ->with('foo')
            ->will($this->returnValue($result));

        $validator = new OptionalValidator($this->_mockedValidator);
        $this->assertSame($result, $validator->isValid('foo'));
    }

    public static function emptyValueProvider()
    {
        return array(
            array(''),
            array(NULL)
        );
    }

    public static function validatorResultProvider()
    {
        return array(
            array(TRUE),
            array(FALSE)
        );
    }

}
