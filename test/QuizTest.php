<?php
use PHPUnit\Framework\TestCase;
use My\Quiz;

class QuizTest extends TestCase
{
   private $object;

   private $quizzes;

   protected function setUp()
   {
      $this->quizzes = \My\Quiz\CSVQuizReader::getQuizzes('MathQuiz.csv');
      $this->object = new \My\Quiz\Quiz($this->quizzes);
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

