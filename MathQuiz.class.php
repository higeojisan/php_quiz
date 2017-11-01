<?php
require_once('AbstractQuiz.class.php');

class MathQuiz extends Quiz
{

   const NUMBERS_OF_QUIZZES = 3; 

   protected $quizzes = array(
      array('question' => '1 + 1は？', 'answer' => 1, 'choice' => array(1, 2, 3)),
      array('question' => '1 * 1は？', 'answer' => 1, 'choice' => array(0, 1, 2)),
      array('question' => '1 - 1は？', 'answer' => 1, 'choice' => array(-1, 0, 1)),
   );

}
