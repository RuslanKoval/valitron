<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is between min and max values
 * Class BetweenRule
 * @package Valitron\Rules
 */
class BetweenRule implements RuleInterface
{
    private $min;
    private $max;

    private function validateMin($field, $value, $min)
    {
        if (is_null($this->min)) {
            $this->min = new MinRule();
        }
        return $this->min->validate($field, $value, array($min));
    }

    private function validateMax($field, $value, $max)
    {
        if (is_null($this->max)) {
            $this->max = new MaxRule();
        }
        return $this->max->validate($field, $value, array($max));
    }

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
        if (!is_numeric($value)) {
            return false;
        }
        if (!isset($params[0]) || !is_array($params[0]) || count($params[0]) !== 2) {
            return false;
        }

        list($min, $max) = $params[0];

        return $this->validateMin($field, $value, $min) && $this->validateMax($field, $value, $max);
    }
}