<?php


namespace Valitron\Exception;


use \Exception;

class ValitronException extends Exception
{
    public static function ruleExists($name)
    {
        return new self(sprintf('Rule %s already exists', $name));
    }

    public static function ruleNotFound($name)
    {
        return new self(sprintf('Rule %s does not exist', $name));
    }

    public static function invalidRuleImplementation($name)
    {
        return new self(sprintf('Invalid implementation provided for rule %s. Implementation must implement \Valitron\RuleInterface', $name));
    }
}