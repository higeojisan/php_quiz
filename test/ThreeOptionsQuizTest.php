<?php
use PHPUnit\Framework\TestCase;
use My\Quiz;

class ThreeOptionsQuizTest extends TestCase
{
   private $object;

   private $quizzes;

   protected function setUp()
   {
      $this->quizzes = \My\Quiz\ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsMathQuiz.csv');
      $this->object = new \My\Quiz\ThreeOptionsQuiz($this->quizzes);
   }

   /**
    * 1,2,3の場合もしくは'1','2','3'のみtrue
    * それ以外はfalse
    */
   public function testinputCheck()
   {
      $this->assertTrue($this->object->inputCheck(1));
      $this->assertTrue($this->object->inputCheck(2));
      $this->assertTrue($this->object->inputCheck(3));
      $this->assertTrue($this->object->inputCheck('1'));
      $this->assertTrue($this->object->inputCheck('2'));
      $this->assertTrue($this->object->inputCheck('3'));
      $this->assertFalse($this->object->inputCheck('１'));
      $this->assertFalse($this->object->inputCheck('２'));
      $this->assertFalse($this->object->inputCheck('３'));
      $this->assertFalse($this->object->inputCheck(''));
      $this->assertFalse($this->object->inputCheck(False));
      $this->assertFalse($this->object->inputCheck(null));
      $this->assertFalse($this->object->inputCheck(array()));
   }
}

