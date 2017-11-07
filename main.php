<?php
require_once('vendor/autoload.php');

quiz_start();

function quiz_start()
{
   // ジャンルの選択
   echo "クイズのジャンルを指定してください" . PHP_EOL;
   echo "【1】数学" . PHP_EOL;
   echo "【2】英語" . PHP_EOL;
   $genre = (int)trim(fgets(STDIN));

   // クイズの方式(2択か3択)の選択
   echo "クイズの方式を指定してください". PHP_EOL;
   echo "【1】2択" . PHP_EOL;
   echo "【2】3択" . PHP_EOL;
   $option = (int)trim(fgets(STDIN));

   // クイズオブジェクトの生成
   $quizzes = \My\Quiz\QuizFactory::create($genre, $option);

   // クイズの開始
   $correct_num = 0;
   for ($i = 0; $i < $quizzes::NUMBERS_OF_QUIZZES; $i++ ) {
      // 問題の表示
      $current_quiz_num = $i + 1;
      echo "Question. $current_quiz_num" . PHP_EOL;
      $quizzes->displayQuiz($i);

      // 選択肢の表示
      $quizzes->displayChoice($i);

      // 回答の入力の受付
      $user_answer = trim(fgets(STDIN));

      // 答え合わせ
      if ($quizzes->isCorrect($user_answer, $i)) {
         $correct_num++;
         echo  "正解！！" . PHP_EOL;
      } else {
         echo "不正解！！" . PHP_EOL;
      }

      // 画面のクリア
      sleep(2);
      echo "\033[;H\033[2J";

      // 最終問題なら採点結果を表示
      if ($i === $quizzes::NUMBERS_OF_QUIZZES - 1) {
         echo "=========採点結果==========" . PHP_EOL;
         echo $quizzes::NUMBERS_OF_QUIZZES . "問中" . $correct_num . "問正解" . PHP_EOL;
         // 続けるか聞く
         echo "続けますか？" . PHP_EOL;
         echo "【1】続ける" . PHP_EOL;
         echo "【2】やめる" . PHP_EOL;
         $continue = trim(fgets(STDIN));
         if ($continue == 1) {
            echo "\033[;H\033[2J";
            quiz_start();
         } else {
            exit;
         }
      }
   }
}

