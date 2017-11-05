<?php
namespace My\Quiz;

class QuizFactory
{
   public static function create($genre)
   {
      switch ($genre) {
         case 1:
            $quizzes = CSVQuizReader::getQuizzes('MathQuiz.csv');
            break;
         case 2:
            $quizzes = CSVQuizReader::getQuizzes('EnglishQuiz.csv');
            break;
      }
      return new Quiz($quizzes);
   }
}
