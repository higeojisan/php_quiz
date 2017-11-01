<?php
class Quiz
{
   const NUMBERS_OF_QUIZZES = 3;

   private $quizzes = array(
         array('question' => '1 + 1は？', 'answer' => 1, 'choice' => array(1, 2, 3)),
         array('question' => '1 * 1は？', 'answer' => 1, 'choice' => array(0, 1, 2)),
         array('question' => '1 - 1は？', 'answer' => 1, 'choice' => array(-1, 0, 1)),
      );

   public function __construct()
   {
      shuffle($this->quizzes);
   }

   public function getQuiz($num)
   {
      return $this->quizzes[$num]['question'];
   }

   public function getAnswer($num)
   {
      return $this->quizzes[$num]['answer'];
   }

   public function getChoices($num)
   {
      return $this->quizzes[$num]['choice'];
   }

   public function isCorrect($user_answer, $num)
   {
      $user_answer--;
      return ($user_answer === $this->getAnswer($num)) ? true : false;
   }

}
