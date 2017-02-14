<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is between min and max values
 * Class BetweenRule
 * @package Valitron\Rules
 */
class BetweenRule implements RuleInterface
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
        }
        if (!isset($params[0]) || !is_array($params[0]) || count($params[0]) !== 2) {
            return false;
        }

        list($min, $max) = $params[0];

        return $validator->validateMin($field, $value, array($min)) && $validator->validateMax($field, $value, array($max));
    }
}