<?php
namespace belanur\validation;

interface ValueValidatorInterface
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value);

    /**
     * @return string
     */
    public function getErrorMessage();
}
