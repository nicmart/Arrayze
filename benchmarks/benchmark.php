<?php
/**
 * This file is part of Benchmark
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Nicolò Martini <nicmartnic@gmail.com>
 */

include '../vendor/autoload.php';
ini_set('xdebug.var_display_max_depth', '10');

class Person
{

    protected $firstName;
    protected $lastName;
    protected $birthYear;

    public function __construct($firstName, $surname, $birthYear) {
        $this->firstName = $firstName;
        $this->lastName = $surname;
        $this->birthYear = $birthYear;
    }

    public function getFirstName() { return $this->firstName; }
    public function getLastName() { return $this->lastName; }
    public function getBirthYear() { return $this->birthYear; }
}

// Since we might not have control of the Person class above, we can just bind a closure
// to it to do what we want. Sneaky.
// This is also faster than registering a bunch of mappings and creating many closures per class.
$toArray = function($that) {
    $fullName = $that->getFirstName() . " " . $that->getLastName();
    // This clock is only right part of the time... you might want a better example than this...
    $age = date("Y") - $that->getBirthYear();
    return [
        "first name" => $that->getFirstName(),
        "last name" => $that->getLastName(),
        "full name" => $fullName,
        "age" => $age,
        "name and age" => "$fullName, $age"
    ];
};

$person = new Person("Joe", "Person", 1983);

$collection = (new \NicMart\Arrayze\MapsCollection)->registerMaps([
    "first name" =>   function(Person $p) { return $p->getFirstName(); },
    "last name" =>    function(Person $p) { return $p->getLAstName(); },
    "full name" =>    function(Person $p) { return "{$p->getFirstName()} {$p->getFirstName()}"; },
    "age" =>          function(Person $p) { return date("Y") - $p->getBirthYear(); },
    "name and age" => function(Person $p) {
        $age = date("Y") - $p->getBirthYear();
        return "{$p->getFirstName()} {$p->getFirstName()}, $age";
    }
]);

$adapted = new \NicMart\Arrayze\ArrayAdapter($person, $collection);

$bench = new \Nicmart\Benchmark\FixedSizeEngine("Arrayze Benchmark - Single Lookup");

$bench
    ->register('native', 'Native closure', function() use ($toArray, $person) {
        $ary = $toArray($person);
        $string = $ary["full name"];
    }, true)
    ->register('arrayze', 'Arrayze', function() use ($person, $collection) {
        $adapted = new \NicMart\Arrayze\ArrayAdapter($person, $collection);
        $string = $adapted["full name"];
    }, true)
;

$bench->benchmark(100000);

$groups[] = $bench->getResults();

$bench = new \Nicmart\Benchmark\FixedSizeEngine("Arrayze Benchmark - Iteration");

$bench
    ->register('native', 'Native closure', function() use ($toArray, $person) {
        $ary = $toArray($person);
        $string = "";
        foreach ($ary as $key => $value)
            $string .= "$key: $value, ";
    }, true)
    ->register('arrayze', 'Arrayze', function() use ($person, $collection) {
        $adapted = new \NicMart\Arrayze\ArrayAdapter($person, $collection);
        $string = "";
        foreach ($adapted as $key => $value)
            $string .= "$key: $value, ";
    }, true)
;

$bench->benchmark(100000);

$groups[] = $bench->getResults();

$template = new \Nicmart\Benchmark\PHPTemplate;
echo $template->render(array('groups' => $groups));
