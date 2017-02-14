<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is a valid date
 *
 * Class DateRule
 * @package Valitron\Rules
 */
class DateRule implements RuleInterface
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
        if ($value instanceof \DateTime) {
            return true;
        }
        return $isDate = strtotime($value) !== false;

    }
}