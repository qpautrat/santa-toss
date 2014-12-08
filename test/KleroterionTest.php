<?php

use QPautrat\SantaToss\Kleroterion;

class KleroterionTest extends PHPUnit_Framework_TestCase
{
    public static $kleroterion;

    public static function setUpBeforeClass()
    {
        self::$kleroterion = new Kleroterion;
    }

    /**
     * @expectedException           Exception
     * @expectedExceptionMessage    You must provide an array of person.
     */
    public function testNotArray()
    {
        $people = "test";

        self::$kleroterion->toss($people);
    }

    /**
     * @expectedException           Exception
     * @expectedExceptionMessage    Come on, don't cheat.
     */
    public function testNotEnoughPeople()
    {
        $people = array("Maria", "John");

        self::$kleroterion->toss($people);
    }

    /**
     * @expectedException           Exception
     * @expectedExceptionMessage    There are duplicate names in the list
     */
    public function testDuplicates()
    {
        $people = array("Maria", "John", "Maria");

        self::$kleroterion->toss($people);
    }

    public function testToss()
    {
        $people = array("Maria" , "John", "Gregoire", "Jeremy", "Gina");

        $newPeople = self::$kleroterion->toss($people);

        $this->assertEquals(count($people), count($newPeople));
        $this->assertNotEquals($people, $newPeople);
    }
}