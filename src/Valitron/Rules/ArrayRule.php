<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is an array
 *
 * Class IntegerRule
 * @package Valitron\Rules
 */
class ArrayRule implements RuleInterface
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
        return is_array($value);
    }
}