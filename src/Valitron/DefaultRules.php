<?php


namespace Valitron;


class DefaultRules extends RulesCollection
{
    protected $rules = array(
        //number
        'min' => '\Valitron\Rules\MinRule',
        'max' => '\Valitron\Rules\MaxRule',
        'between' => '\Valitron\Rules\BetweenRule',

        //string
        'length' => '\Valitron\Rules\LengthRule',
        'lengthmin' => '\Valitron\Rules\LengthMinRule',
        'lengthmax' => '\Valitron\Rules\LengthMaxRule',
        'lengthbetween' => '\Valitron\Rules\LengthBetweenRule',
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
        'numeric' => '\Valitron\Rules\NumericRule',
        'integer' => '\Valitron\Rules\IntegerRule',
        'array' => '\Valitron\Rules\ArrayRule',

        //misc
        'required' => '\Valitron\Rules\RequiredRule',
        'equals' => '\Valitron\Rules\EqualsRule',
        'different' => '\Valitron\Rules\DifferentRule',
        'accepted' => '\Valitron\Rules\AcceptedRule',
        'optional' => '\Valitron\Rules\OptionalRule',
        'in' => '\Valitron\Rules\InRule',
        'notin' => '\Valitron\Rules\NotInRule',
    );
}