<?php
namespace My\Quiz;

class QuizFactory
{
   public static function create($genre, $option)
   {
      if ($option === 2) {
         // 3択クイズの場合
         switch ($genre) {
            case 1:
               $quizzes = ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsMathQuiz.csv');
               break;
            case 2:
               $quizzes = ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsEnglishQuiz.csv');
               break;
         }
         return new ThreeOptionsQuiz($quizzes);
      } elseif ($option === 1) {
         // 2択クイズの場合
         switch ($genre) {
            case 1:
               $quizzes = TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsMathQuiz.csv');
               break;
            case 2:
               $quizzes = TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsEnglishQuiz.csv');
               break;
         }
         return new TwoOptionsQuiz($quizzes);
      }
   }
}
