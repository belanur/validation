<?php
namespace belanur\validation;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $_invalidFields = array();

    /**
     * @var array
     */
    protected $_validators = array();

    /**
     * @var bool
     */
    private $_isSetUp = FALSE;

    /**
     * @param ValueValidatorInterface $validator
     * @param string $fieldName
     */
    protected function _registerValidator(ValueValidatorInterface $validator, $fieldName)
    {
        $this->_validators[$fieldName][] = $validator;
    }

    /**
     *
     */
    abstract protected function _setUp();

    /**
     * @param array $postData
     * @return bool
     */
    final public function isValid(array $postData)
    {
        if (!$this->_isSetUp) {
            $this->_setUp();
            $this->_isSetUp = TRUE;
        }
        $this->_invalidFields = array();
        foreach ($this->_validators as $fieldName => $validators) {
            $value = '';
            if (isset($postData[$fieldName])) {
                $value = $postData[$fieldName];
            }
            foreach ($validators as $validator) {
                /** @var ValueValidatorInterface $validator */
                $result = $validator->isValid($value);
                if (!$result) {
                    $this->_invalidFields[$fieldName][] = $validator->getErrorMessage();
                }
            }
        }
        return count($this->_invalidFields) == 0;
    }

    public function getInvalidFields()
    {
        return $this->_invalidFields;
    }
}
