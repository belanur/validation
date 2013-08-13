<?php
namespace belanur\validation;

class SampleValidator extends AbstractValidator
{
    /**
     *
     */
    protected function _setUp()
    {
        $this->_registerValidator(new NotEmptyValidator(), 'somefield');
    }
}
