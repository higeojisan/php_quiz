<?php
use PHPUnit\Framework\TestCase;
use My\Quiz;

class FillInTheBlankQuizTest extends TestCase
{
   private $object;

   private $quizzes;

   protected function setUp()
   {
      $this->quizzes = \My\Quiz\FillInTheBlankCSVQuizReader::getQuizzes('FillInTheBlankSoccerQuiz.csv');
      $this->object = new \My\Quiz\FillInTheBlankQuiz($this->quizzes);
   }

   /**
    * ''(空白)の場合のみfalse
    * それ以外はfalse
    */
   public function testinputCheck()
   {
      $this->assertTrue($this->object->inputCheck('y'));
      $this->assertTrue($this->object->inputCheck('n'));
      $this->assertFalse($this->object->inputCheck(''));
   }
}

