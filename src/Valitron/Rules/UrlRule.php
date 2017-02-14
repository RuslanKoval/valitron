<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is a valid URL by syntax
 *
 * Class UrlRule
 * @package Valitron\Rules
 */
class UrlRule implements RuleInterface
{
    /**
     * @var array
     */
    protected $validUrlPrefixes = array('http://', 'https://', 'ftp://');

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
        foreach ($this->validUrlPrefixes as $prefix) {
            if (strpos($value, $prefix) !== false) {
                return filter_var($value, \FILTER_VALIDATE_URL) !== false;
            }
        }

        return false;
    }
}