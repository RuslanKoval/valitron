<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is a valid IP address
 *
 * Class UrlRule
 * @package Valitron\Rules
 */
class IpRule implements RuleInterface
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
        return filter_var($value, \FILTER_VALIDATE_IP) !== false;
    }
}