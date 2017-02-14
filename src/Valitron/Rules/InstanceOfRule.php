<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Check if field is an instance of a specific class
 *
 * Class InstanceOfRule
 * @package Valitron\Rules
 */
class InstanceOfRule implements RuleInterface
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
        if (is_object($value)) {
            if (is_object($params[0]) && $value instanceof $params[0]) {
                return true;
            }
            if (get_class($value) === $params[0]) {
                return true;
            }
        }
        if (is_string($value)) {
            if (is_string($params[0]) && get_class($value) === $params[0]) {
                return true;
            }
        }

        return false;
    }
}