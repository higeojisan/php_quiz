<?php
namespace My\Quiz;

abstract class AbstractQuiz
{
   protected $quizzes;

   public function __construct($quizzes)
   {
      $this->quizzes = $quizzes;
      shuffle($this->quizzes);
   }

   protected function getQuiz($num)
   {
      return $this->quizzes[$num]['question'];
   }

   protected function getAnswer($num)
   {
      return $this->quizzes[$num]['answer'];
   }

   protected function getChoices($num)
   {
      return $this->quizzes[$num]['choice'];
   }

   public function isCorrect($user_answer, $num)
   {
      $user_answer--;
      return ($user_answer === $this->getAnswer($num)) ? true : false;
   }

}
