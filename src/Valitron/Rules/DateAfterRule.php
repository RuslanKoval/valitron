<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate the date is after a given date
 *
 * Class DateBeforeRule
 * @package Valitron\Rules
 */
class DateAfterRule implements RuleInterface
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
        $vtime = ($value instanceof \DateTime) ? $value->getTimestamp() : strtotime($value);
        $ptime = ($params[0] instanceof \DateTime) ? $params[0]->getTimestamp() : strtotime($params[0]);

        return $vtime > $ptime;
    }
}