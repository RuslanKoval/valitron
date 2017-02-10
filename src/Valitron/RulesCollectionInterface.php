<?php


namespace Valitron;


use Valitron\Exception\ValitronException;

interface RulesCollectionInterface
{
    /**
     * Add a rule
     *
     * @param string $name
     * @param string|RuleInterface $implementation
     * @return void
     *
     * @throws ValitronException
     */
    public function addRule($name, $implementation);

    /**
     * Check if a rule is registered
     *
     * @param string $name
     * @return bool
     */
    public function hasRule($name);

    /**
     * Get a Rule instance as a flyweight
     *
     * @param string $name
     * @return RuleInterface mixed
     *
     * @throws ValitronException
     */
    public function getRule($name);
}