<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is a valid e-mail address
 *
 * Class EmailRule
 * @package Valitron\Rules
 */
class EmailRule implements RuleInterface
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
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}