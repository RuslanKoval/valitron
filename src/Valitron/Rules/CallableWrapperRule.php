<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

class CallableWrapperRule implements RuleInterface
{

    private $callable;

    public function __construct($callable)
    {
        $this->callable = $callable;
    }

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
        return (bool) call_user_func_array($this->callable, func_get_args());
    }
}