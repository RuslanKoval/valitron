<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that two values match
 *
 * Class IntegerRule
 * @package Valitron\Rules
 */
class EqualsRule implements RuleInterface
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
        $field2 = $params[0];

        return isset($data[$field2]) && $value == $data[$field2];
    }
}