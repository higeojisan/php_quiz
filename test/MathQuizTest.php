<?php
use PHPUnit\Framework\TestCase;
use My\Quiz;

class MathQuizTest extends TestCase
{
   protected $object;

   protected $quizzes = array(
      array('question' => '1 + 1は？', 'answer' => 1, 'choice' => array(1, 2, 3)),
      array('question' => '1 * 1は？', 'answer' => 1, 'choice' => array(0, 1, 2)),
      array('question' => '1 - 1は？', 'answer' => 1, 'choice' => array(-1, 0, 1)),
   ); 

   protected function setUp()
   {
      $this->object = new \My\Quiz\MathQuiz();
   }

   public function testgetQuiz()
   {
      foreach ($this->quizzes as $quiz) {
         $this->assertArrayHasKey('question', $quiz);
      }
   }

   public function testgetAnswer()
   {
      foreach ($this->quizzes as $quiz) {
         $this->assertArrayHasKey('answer', $quiz);
      }
   }

   public function testgetChoices()
   {
      foreach ($this->quizzes as $quiz) {
         $this->assertArrayHasKey('choice', $quiz);
      }
   }

   public function testisCorrect()
   {
   }

}

