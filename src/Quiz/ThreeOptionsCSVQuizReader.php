<?php
namespace My\Quiz;

class ThreeOptionsCSVQuizReader implements QuizReader
{
   public static function getQuizzes($filename)
   {
      $filepath = dirname(__FILE__) . '/../../data/' . $filename;
      $quizzes = array();
      $fo = new \SplFileObject($filepath);
      $fo->setFlags(\SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);
      foreach ($fo as $key => $line) {
         // 1行目を飛ばす
         if ($key === 0) {
            continue;
         }
         $quiz = array();
         $quiz['question'] = $line[0];
         $quiz['choice'] = array($line[1], $line[2], $line[3]);
         $quiz['answer'] = (int)$line[4];
         $quizzes[] = $quiz;
      }
      return $quizzes;
   }
}
