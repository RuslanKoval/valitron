<?php


namespace Valitron\Rules;


class NotInRule extends InRule
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
        return !parent::validate($field, $value, $params, $data);
    }
}