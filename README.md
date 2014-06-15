# Php library template

This is the basic skeleton I use each time I create a new php library. It includes basic phpunit, travisci and composer configuration,
and a basic folder structure.

There are few template variables I substitute with a "find and replace" each time I initialize the library. This variables are
- Arrayze The name of the library
- arrayze The sluggified version of library name, used in composer configuration
- A callback-based decorator that gives array access to values. A brief descrption of what the library does
- NicMart\Arrayze The main library namespace. I usually set this equal to the camelized library name

Other values like library author name and email are hardcoded in the files.

What follows is the skeleton README.md file.

# Arrayze
[![Build Status](https://travis-ci.org/nicmart/Arrayze.png?branch=master)](https://travis-ci.org/nicmart/Arrayze)
[![Coverage Status](https://coveralls.io/repos/nicmart/Arrayze/badge.png?branch=master)](https://coveralls.io/r/nicmart/Arrayze?branch=master)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/nicmart/Arrayze/badges/quality-score.png?s=e06818508807c109a8c9354a73fc1a5227426c09)](https://scrutinizer-ci.com/g/nicmart/StringTemplate/)

A callback-based decorator that gives array access to values..

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