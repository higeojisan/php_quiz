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
                  return new ThreeOptionsQuiz(ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsMathQuiz.csv'));
                  break;
               // 2択クイズの場合
               case self::TWOOPTIONS:
                  return new TwoOptionsQuiz(TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsMathQuiz.csv'));
                  break;
            }
         // 英語の場合
         case self::ENGLISH:
            switch ($option) {
               // 3択クイズの場合
               case self::THREEOPTIONS:
                  return new ThreeOptionsQuiz(ThreeOptionsCSVQuizReader::getQuizzes('ThreeOptionsEnglishQuiz.csv'));
                  break;
               // 2択クイズの場合
               case self::TWOOPTIONS:
                  return new TwoOptionsQuiz(TwoOptionsCSVQuizReader::getQuizzes('TwoOptionsEnglishQuiz.csv'));
                  break;
            }
         // サッカーの場合
         case self::SOCCER:
            switch ($option) {
               // 穴埋めクイズの場合
               case self::FILLINTHEBLANK:
                  return new FillInTheBlankQuiz(FillInTheBlankCSVQuizReader::getQuizzes('FillInTheBlankSoccerQuiz.csv'));
                  break;
            }
      }
   }
}
