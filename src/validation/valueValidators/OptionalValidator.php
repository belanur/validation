<?php
namespace belanur\validation;

/**
 * Class OptionalValidator
 * @package belanur\validation
 */
class OptionalValidator implements ValueValidatorInterface
{
    /**
     * @var ValueValidatorInterface
     */
    protected $_validator;

    /**
     * @param ValueValidatorInterface $validator
     */
    public function __construct(ValueValidatorInterface $validator)
    {
        $this->_validator = $validator;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        if ('' === $value) {
            return TRUE;
        }
        return $this->_validator->isValid($value);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->_validator->getErrorMessage();
    }

}
