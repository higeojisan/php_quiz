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

   abstract protected function getQuiz($num);

   abstract protected function getAnswer($num);

   abstract protected function getChoices($num);

   abstract public function isCorrect($user_answer, $num);

   abstract public function displayQuiz($num);

   abstract public function displayChoice($num);
}
