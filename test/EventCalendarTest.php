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

        //Tests if an array has been generated
        $this->assertGreaterThan($exp, $res);

        //Tests if empty days are correct
        $exp = 4;
        $res = $calendar->getWeeks();
        $count = 0;

        foreach($res as $value => $key){
            foreach($key->getWeekdays() as $day){
                if($day->getDayOfMonthNumber() == null){
                    $count++;
                }
            }
        }
        $this->assertEquals($exp, $count);
    }

}
