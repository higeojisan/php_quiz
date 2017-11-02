<?php
namespace My\Quiz;

class QuizFactory
{
   public static function create($genre)
   {
      switch ($genre) {
         case 1:
            return new MathQuiz();
            break;
         case 2:
            return new EnglishQuiz();
            break;
      }
   }
}
