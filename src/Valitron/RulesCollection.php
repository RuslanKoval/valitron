<?php


namespace Valitron;


use Valitron\Exception\ValitronException;

class RulesCollection implements RulesCollectionInterface
{

    private $rules = array(
        //number
        'min' => '\Valitron\Rules\MinRule',
        'max' => '\Valitron\Rules\MaxRule',
        'between' => '\Valitron\Rules\BetweenRule',

        //string
        'email' => '\Valitron\Rules\EmailRule',
        'creditcard' => '\Valitron\Rules\CreditCardRule',
        'regex' => '\Valitron\Rules\RegexRule',
        'alpha' => '\Valitron\Rules\AlphaRule',
        'alphanum' => '\Valitron\Rules\AlphaNumRule',
        'slug' => '\Valitron\Rules\SlugRule',
        'ip' => '\Valitron\Rules\IpRule',
        'url' => '\Valitron\Rules\UrlActiveRule',
        'urlactive' => '\Valitron\Rules\UrlActiveRule',

        'contains' => '\Valitron\Rules\ContainsRule',

        //date
        'date' => '\Valitron\Rules\DateRule',
        'dateformat' => '\Valitron\Rules\DateFormatRule',
        'datebefore' => '\Valitron\Rules\DateBeforeRule',
        'dateafter' => '\Valitron\Rules\DateAfterRule',

        //types
        'instanceof' => '\Valitron\Rules\InstanceOfRule',
        'boolean' => '\Valitron\Rules\BooleanRule',

        //misc
        'optional' => '\Valitron\Rules\OptionalRule',
        'in' => '\Valitron\Rules\InRule',
        'notin' => '\Valitron\Rules\NotInRule',


    );


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
        $name = strtolower($name);
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
        $name = strtolower($name);
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
        $name = strtolower($name);
        if (!$this->hasRule($name)) {
            throw ValitronException::ruleNotFound($name);
        }

        if (!is_object($this->rules[$name])) {
            $this->rules[$name] = new $this->rules[$name];
        }

        return $this->rules[$name];
    }
}