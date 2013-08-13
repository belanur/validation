<?php
namespace belanur\validation;

class NotEmptyValidator implements ValueValidatorInterface
{
    public function isValid($value)
    {
        return '' !== $value;
    }

    public function getErrorMessage()
    {
        return 'Empty';
    }
}
