<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field contains only alphabetic characters
 *
 * Class AlphaRule
 * @package Valitron\Rules
 */
class AlphaRule implements RuleInterface
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
        return preg_match('/^([a-z])+$/i', $value);
    }
}