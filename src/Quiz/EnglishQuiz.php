<?php
namespace My\Quiz;

class EnglishQuiz extends AbstractQuiz
{

   const NUMBERS_OF_QUIZZES = 3;

   protected $quizzes = array(
      array('question' => '犬は？', 'answer' => 1, 'choice' => array('fox', 'dog', 'cat')),
      array('question' => '本は？', 'answer' => 1, 'choice' => array('dictionary', 'book', 'laptop')),
      array('question' => '日本は？', 'answer' => 1, 'choice' => array('france', 'japan', 'brazil')),
   );

}
