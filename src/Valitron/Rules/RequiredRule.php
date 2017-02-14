<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Required field validator
 *
 * Class RequiredRule
 * @package Valitron\Rules
 */
class RequiredRule implements RuleInterface
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
        if (is_null($value)) {
            return false;
        }
        if (is_string($value) && trim($value) === '') {
            return false;
        }

        return true;
    }
}