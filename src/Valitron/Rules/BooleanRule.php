<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field contains a boolean.
 *
 * Class BooleanRule
 * @package Valitron\Rules
 */
class BooleanRule implements RuleInterface
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
        return is_bool($value);
    }
}