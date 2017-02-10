<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate a field contains a given string
 *
 * Class ContainsRule
 * @package Valitron\Rules
 */
class ContainsRule implements RuleInterface
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

        if (!isset($params[0])) {
            return false;
        }
        if (!is_string($params[0]) || !is_string($value)) {
            return false;
        }

        $strict = true;
        if (isset($params[1])) {
            $strict = (bool)$params[1];
        }

        $isContains = false;
        if ($strict) {
            if (function_exists('mb_strpos')) {
                $isContains = mb_strpos($value, $params[0]) !== false;
            } else {
                $isContains = strpos($value, $params[0]) !== false;
            }
        } else {
            if (function_exists('mb_stripos')) {
                $isContains = mb_stripos($value, $params[0]) !== false;
            } else {
                $isContains = stripos($value, $params[0]) !== false;
            }
        }
        return $isContains;
    }
}