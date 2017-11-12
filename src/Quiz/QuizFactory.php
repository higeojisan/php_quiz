<?php
namespace My\Quiz;

class QuizFactory
{
   // クイズのジャンルの定数
   const MATH = 1;
   const ENGLISH = 2;
   const SOCCER = 3;

   // クイズの方式の定数
   const TWOOPTIONS = 1; // 2択
   const THREEOPTIONS = 2; // 3択
   const FILLINTHEBLANK = 3; // 穴埋め

   public static function create($genre, $option)
   {
      switch ($genre) {
         // 数学の場合
         case self::MATH:
            switch ($option) {
               // 3択クイズの場合
               case self::THREEOPTIONS:
                  $quizzes = ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsMathQuiz.csv');
                  return new ThreeOptionsQuiz($quizzes);
                  break;
               // 2択クイズの場合
               case self::TWOOPTIONS:
                  $quizzes = TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsMathQuiz.csv');
                  return new TwoOptionsQuiz($quizzes);
                  break;
            }
         // 英語の場合
         case self::ENGLISH:
            switch ($option) {
               // 3択クイズの場合
               case self::THREEOPTIONS:
                  $quizzes = ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsEnglishQuiz.csv');
                  return new ThreeOptionsQuiz($quizzes);
                  break;
               // 2択クイズの場合
               case self::TWOOPTIONS:
                  $quizzes = TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsEnglishQuiz.csv');
                  return new TwoOptionsQuiz($quizzes);
                  break;
            }
         // サッカーの場合
         case self::SOCCER:
            switch ($option) {
               // 穴埋めクイズの場合
               case self::FILLINTHEBLANK:
                  $quizzes = FillInTheBlankCSVQuizReader::getQuizzes('FillInTheBlankSoccerQuiz.csv');
                  return new FillInTheBlankQuiz($quizzes);
                  break;
            }
      }
   }
}
