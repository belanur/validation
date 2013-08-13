<?php
namespace belanur\validation;

class RegistrationValidator extends AbstractValidator
{
    /**
     *
     */
    protected function _setUp()
    {
        $this->_registerValidator(new NotEmptyValidator(), 'password');
    }
}
