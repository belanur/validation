<?php
namespace belanur\validation;

interface ValidatorInterface
{
    /**
     * @param array $postData
     * @return bool
     */
    public function isValid(array $postData);

    /**
     * @return array
     */
    public function getInvalidFields();
}
