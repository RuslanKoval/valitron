<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is different from another field
 *
 * Class IntegerRule
 * @package Valitron\Rules
 */
class DifferentRule implements RuleInterface
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
        $field2 = $params[0];

        return isset($data[$field2]) && $value != $data[$field2];
    }
}