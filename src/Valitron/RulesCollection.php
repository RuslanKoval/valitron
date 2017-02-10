<?php


namespace Valitron;


use Valitron\Exception\ValitronException;

class RulesCollection implements RulesCollectionInterface
{

    private $rules = [];

    /**
     * Add a rule
     *
     * @param string $name
     * @param string|RuleInterface $implementation
     * @return void
     *
     * @throws ValitronException
     */
    public function addRule($name, $implementation)
    {
        if ($this->hasRule($name)) {
            throw ValitronException::ruleExists($name);
        }
        if (!is_subclass_of($implementation, '\Valitron\RuleInterface')) {
            throw ValitronException::invalidRuleImplementation($name);
        }
        $this->rules[$name] = $implementation;

    }

    /**
     * Check if a rule is registered
     *
     * @param string $name
     * @return bool
     */
    public function hasRule($name)
    {
        return array_key_exists($name, $this->rules);
    }

    /**
     * Get a Rule instance as a flyweight
     *
     * @param string $name
     * @return RuleInterface mixed
     *
     * @throws ValitronException
     */
    public function getRule($name)
    {
        if (!$this->hasRule($name)) {
            throw ValitronException::ruleNotFound($name);
        }

        if (!is_object($this->rules[$name])) {
            $this->rules[$name] = new $this->rules[$name];
        }

        return $this->rules[$name];
    }
}