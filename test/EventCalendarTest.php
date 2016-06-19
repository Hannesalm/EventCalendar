<?php
namespace qcode\eventCalendar;
use Mos\Database;
/**
 * A testclass
 *
 */
class EventDatabase extends \Mos\Database\CDatabaseBasic{

    /**
     * My name is - from database.
     *
     * @return string
     *
     */
    public function getNameFromDatabase()
    {
        $this->select("name")
            ->from("test")
            ->where("id = ?")
        ;

        $res = $this->executeFetchAll([1]);
        $name = isset($res[0]->name) ? $res[0]->name : false;
        return $name;
    }

}

class EventCalendarTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     *
     */

    static private $event;
    const NAME =  "test";

    /**
     * setUpBeforeClass, called once for all tests in this class.
     *
     * @return void
     *
     */
    public static function setUpBeforeClass()
    {
        self::$event = new EventDatabase();
        self::$event->setOptions(['dsn' => 'sqlite::memory:', "verbose" => false]);
        self::$event->connect();
        self::$event->dropTableIfExists("test");
        self::$event->execute();
        self::$event->createTable(
            'test',
            [
                'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
                'name'  => ['varchar(20)'],
            ]
        );
        self::$event->execute();
        self::$event->insert(
            'test',
            ['name']
        );
        self::$event->execute([self::NAME]);
    }

    public function testGetNameFromDatabase()
    {
        $res = self::$event->getNameFromDatabase();
        $exp = self::NAME;
        $this->assertEquals($res, $exp, "The name does not match name from db.");
    }


    public function testGetMonth(){
        $calendar = new \Anax\Calendar\CCalendar();
        $res = $calendar->getMonth();
        $exp = "06";

        $this->assertEquals($res, $exp, "The name does not match.");
    }

}
