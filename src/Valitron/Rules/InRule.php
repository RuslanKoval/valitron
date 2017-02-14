<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate a field is contained within a list of values
 *
 * Class InRule
 * @package Valitron\Rules
 */
class InRule implements RuleInterface
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
        $isAssoc = array_values($params[0]) !== $params[0];
        if ($isAssoc) {
            $params[0] = array_keys($params[0]);
        }

        $strict = false;
        if (isset($params[1])) {
            $strict = $params[1];
        }

        return in_array($value, $params[0], $strict);
    }
}