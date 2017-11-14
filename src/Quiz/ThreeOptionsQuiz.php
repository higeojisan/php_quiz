<?php
namespace My\Quiz;

class ThreeOptionsQuiz extends AbstractQuiz
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
      return $this->quizzes[$num]['choice'];
   }

   public function displayQuiz($num)
   {
      echo "問題：" . $this->getQuiz($num) . PHP_EOL;
   }

   public function displayChoice($num)
   {
      $choices = $this->getChoices($num);
      $choice_num = 1;
      foreach ($choices as $choice) {
         echo "選択肢$choice_num. " . $choice . PHP_EOL;
         $choice_num++;
      }
   }

   public function isCorrect($user_answer, $num)
   {
      $user_answer--;
      return ($user_answer === $this->getAnswer($num)) ? true : false;
   }

   public function inputCheck($user_answer)
   {
      $user_answer = (int)$user_answer;
      if ($user_answer === 1 || $user_answer === 2 || $user_answer === 3) {
         return true;
      } else {
         echo "1から3の半角数字を入力してください" . PHP_EOL;
         return false;
      }
   }
}
