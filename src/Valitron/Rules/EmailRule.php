<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

class EmailRule implements RuleInterface
{

    /**
     * Run validation and return boolean result
     * @param string $field
     * @param mixed $value
     * @param array $params
     * @param array $data
     * @return bool
     */
    public function validate($field, $value, $params = array(), $data = array())
    {
        return (bool)filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}