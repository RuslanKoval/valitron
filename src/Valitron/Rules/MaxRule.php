<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is less than a maximum value
 * Class MaxRule
 * @package Valitron\Rules
 */
class MaxRule implements RuleInterface
{

    /**
     * Run validation and return boolean result
     *
     * @param string $field
     * @param mixed $value
     * @param array $params
     * @param array $data
     * @param \Valitron\Validator $validator
     *
     * @return bool
     */
    public function validate($field, $value, $params = array(), $data = array(), $validator = null)
    {
        if (!is_numeric($value)) {
            return false;
        } elseif (function_exists('bccomp')) {
            return !(bccomp($value, $params[0], 14) === 1);
        } else {
            return $params[0] >= $value;
        }
    }
}