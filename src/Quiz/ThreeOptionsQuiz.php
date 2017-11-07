<?php
namespace My\Quiz;

class ThreeOptionsQuiz extends AbstractQuiz
{
   const NUMBERS_OF_QUIZZES = 3;

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
} 
