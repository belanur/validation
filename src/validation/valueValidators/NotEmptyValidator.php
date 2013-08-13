<?php
namespace belanur\validation;

/**
 * Class NotEmptyValidator
 * @package belanur\validation
 */
class NotEmptyValidator implements ValueValidatorInterface
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        return '' !== $value && NULL !== $value;
    }
}
