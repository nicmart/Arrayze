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