<?php
use PHPUnit\Framework\TestCase;
use My\Quiz;

class TwoOptionsQuizTest extends TestCase
{
   private $object;

   private $quizzes;

   protected function setUp()
   {
      $this->quizzes = \My\Quiz\TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsMathQuiz.csv');
      $this->object = new \My\Quiz\TwoOptionsQuiz($this->quizzes);
   }

   /**
    * 'y'もしくは'n'の場合のみtrue
    * それ以外はfalse
    */
   public function testinputCheck()
   {
      $this->assertTrue($this->object->inputCheck('y'));
      $this->assertTrue($this->object->inputCheck('n'));
      $this->assertFalse($this->object->inputCheck(''));
      $this->assertFalse($this->object->inputCheck(1));
      $this->assertFalse($this->object->inputCheck(null));
      $this->assertFalse($this->object->inputCheck(False));
      $this->assertFalse($this->object->inputCheck(array()));
   }
}

