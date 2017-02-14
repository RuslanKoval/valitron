<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is greater than a minimum value
 *
 * Class MinRule
 * @package Valitron\Rules
 */
class MinRule implements RuleInterface
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
            return !(bccomp($params[0], $value, 14) === 1);
        } else {
            return $params[0] <= $value;
        }
    }
}