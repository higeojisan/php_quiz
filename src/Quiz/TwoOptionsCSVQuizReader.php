<?php
namespace My\Quiz;

class TwoOptionsCSVQuizReader
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
         $quiz['answer'] = $line[1];
         $quizzes[] = $quiz;
      }
      return $quizzes;
   }
}
