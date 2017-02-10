<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field matches a date format
 *
 * Class DateFormatRule
 * @package Valitron\Rules
 */
class DateFormatRule implements RuleInterface
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
        $parsed = date_parse_from_format($params[0], $value);

        return $parsed['error_count'] === 0 && $parsed['warning_count'] === 0;
    }
}