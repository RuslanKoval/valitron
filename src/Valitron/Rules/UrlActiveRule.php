<?php


namespace Valitron\Rules;


use Valitron\RuleInterface;

/**
 * Validate that a field is an active URL by verifying DNS record
 *
 * Class UrlActiveRule
 * @package Valitron\Rules
 */
class UrlActiveRule implements RuleInterface
{
    /**
     * @var array
     */
    protected $validUrlPrefixes = array('http://', 'https://', 'ftp://');

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
        foreach ($this->validUrlPrefixes as $prefix) {
            if (strpos($value, $prefix) !== false) {
                $host = parse_url(strtolower($value), PHP_URL_HOST);

                return checkdnsrr($host, 'A') || checkdnsrr($host, 'AAAA') || checkdnsrr($host, 'CNAME');
            }
        }

        return false;
    }
}