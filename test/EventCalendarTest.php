<?php

include __DIR__ . '/../src/Calendar/CCalendar.php';
/**
 * A testclass
 *
 */

class EventCalendarTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     *
     */

    public function testCalendarData(){
        $calendar = new CCalendar();

        $calendar->getValues("2015", "05");
        $calendar->generateCalenderData();
        $res = count($calendar->getWeeks());
        $exp = 0;

        $this->assertGreaterThan($exp, $res);
    }

}
