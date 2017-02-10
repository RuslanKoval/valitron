<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field passes a regular expression check
 *
 * Class RegexRule
 * @package Valitron\Rules
 */
class RegexRule implements RuleInterface
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
        return preg_match($params[0], $value);
    }
}