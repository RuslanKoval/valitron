<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field was "accepted" (based on PHP's string evaluation rules)
 *
 * Class IntegerRule
 * @package Valitron\Rules
 */
class AcceptedRule implements RuleInterface
{

    protected $acceptable = array('yes', 'on', 1, '1', true);

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
        return in_array($value, $this->acceptable, true);
    }
}