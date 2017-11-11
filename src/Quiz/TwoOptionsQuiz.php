<?php
namespace My\Quiz;

class TwoOptionsQuiz extends AbstractQuiz
{
   const NUMBERS_OF_QUIZZES = 3;

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
   }

   public function displayQuiz($num)
   {
      echo "問題：" . $this->getQuiz($num) . PHP_EOL;
   }

   public function displayChoice($num)
   {
      echo "はい(y) or いいえ(n)" . PHP_EOL;
   }

   public function isCorrect($user_answer, $num)
   {
      return ($user_answer === $this->getAnswer($num)) ? true : false;
   }
}
