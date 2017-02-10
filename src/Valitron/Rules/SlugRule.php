<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field contains only alpha-numeric characters, dashes, and underscores
 *
 * Class SlugRule
 * @package Valitron\Rules
 */
class SlugRule implements RuleInterface
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
        return preg_match('/^([-a-z0-9_-])+$/i', $value);
    }
}