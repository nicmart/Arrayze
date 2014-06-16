# Arrayze
[![Build Status](https://travis-ci.org/nicmart/Arrayze.png?branch=master)](https://travis-ci.org/nicmart/Arrayze)
[![Coverage Status](https://coveralls.io/repos/nicmart/Arrayze/badge.png)](https://coveralls.io/r/nicmart/Arrayze)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nicmart/Arrayze/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nicmart/Arrayze/?branch=master)

Give your values a lazy and functional array interface!

## What is Arrayze?

Arrayze gives you an [adapter](http://en.wikipedia.org/wiki/Adapter_pattern) for ArrayAccess and Traversable
php interfaces. The adapter is built from a collection of callbacks, that maps the original value to runtime-computed
 values.

This means that you can easily give your objects or values an array-like interface, specifying how to compute
 offsets through callbacks.

## Example
Let's suppose you have a Person class:

```php
class Person
{
    private $firstName;
    private $lastName;
    private $birthYear;

    public function __construct($firstName, $surname, $birthYear) { ... }

    public function getFirstName() { return $this->firstName; }
    public function getLastName() { return $this->lastName; }
    public function getBirthYear() { return $this->birthYear; }
}
```

You specify then a collection of maps:

```php

```
## Install

The best way to install Arrayze is [through composer](http://getcomposer.org).

Just create a composer.json file for your project:

```JSON
{
    "require": {
        "nicmart/arrayze": "~0.1"
    }
}
```

Then you can run these two commands to install it:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

or simply run `composer install` if you have have already [installed the composer globally](http://getcomposer.org/doc/00-intro.md#globally).

Then you can include the autoloader, and you will have access to the library classes:

```php
<?php
require 'vendor/autoload.php';
```