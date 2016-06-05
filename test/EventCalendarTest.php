<?php
namespace gel\logger;
/**
 * A testclass
 *
 */
class CLoggingHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     */
    public function testFriendlyErrorType(){
        $log = new CLoggingHelper("tmp/example.log.php");
        $res = $log->friendly_error_type(2);
        $exp = "WARNING";
        $this->assertEquals($res, $exp,  "...");
    }
    public function testObjectCanBeConstructedForValidConstructorArguments(){
        $log = new CLoggingHelper("tmp/example.log.php");
        $this->assertInstanceOf('gel\\logger\\CLoggingHelper', $log);
    }
    /**
     * @expectedException \gel\logger\Exception
     */
    public function testExceptionIsThrownForFileHandler(){
        $log = new CLoggingHelper(NULL);
        $log->log(1, '', '', 1);
    }
}
