# Arrayze
[![Build Status](https://travis-ci.org/nicmart/Arrayze.png?branch=master)](https://travis-ci.org/nicmart/Arrayze)
[![Coverage Status](https://coveralls.io/repos/nicmart/Arrayze/badge.png)](https://coveralls.io/r/nicmart/Arrayze)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nicmart/Arrayze/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nicmart/Arrayze/?branch=master)

A callback-based array adapter that gives array access to values..

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