<?php
namespace My\Quiz;

class FillInTheBlankQuiz extends AbstractQuiz
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
      echo "(     )に当てはまる言葉を入力してください" . PHP_EOL;
   }

   public function isCorrect($user_answer, $num)
   {
      return ($user_answer === $this->getAnswer($num)) ? true : false;
   }

   public function inputCheck($user_answer)
   {
      if ($user_answer !== "") {
         return true;
      } else {
         echo "何かしら入力してください" . PHP_EOL;
         return false;
      }
   }
}
